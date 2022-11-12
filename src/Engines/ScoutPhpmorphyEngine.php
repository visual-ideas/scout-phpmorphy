<?php

namespace VI\ScoutPhpmorphy\Engines;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Builder;
use Laravel\Scout\Engines\Engine;
use VI\ScoutPhpmorphy\Models\Index;
use VI\ScoutPhpmorphy\Models\Word;
use VI\ScoutPhpmorphy\Services\WordsService;

class ScoutPhpmorphyEngine extends Engine
{
    public function update($models): Collection
    {
        $models->each(function ($model) use (&$params) {
            $words = WordsService::prepareArray($model->toSearchableArray());
            $words = Word::getOrCreateItems($words);

            foreach ($words as $word) {
                Index::firstOrCreate([
                    'index' => $model->searchableAs(),
                    'key' => $model->getScoutKey(),
                    'word_id' => $word->id,
                    'count_words' => $word->count_words,
                ]);
            }
        });

        return $models;
    }

    public function delete($models)
    {
        $models->each(function ($model) {
            Index::query()
                ->where('index', $model->searchableAs())
                ->where('key', $model->getScoutKey())
                ->delete();
        });
    }

    public function search(Builder $builder)
    {
        $index = $this->buildIndexQuery($builder)
            ->selectRaw('`index`, `key`, COUNT(*) AS `count_lines`, SUM(`count_words`) AS `sum_count_words`')
            ->groupBy('index', 'key')
            ->orderByRaw('`count_lines` DESC, `sum_count_words` DESC')
            ->get();

        return $index;
    }

    public function paginate(Builder $builder, $perPage, $page)
    {
        $index = $this->buildIndexQuery($builder)
            ->selectRaw('`index`, `key`, COUNT(*) AS `count_lines`, SUM(`count_words`) AS `sum_count_words`')
            ->groupBy('index', 'key')
            ->orderByRaw('`count_lines` DESC, `sum_count_words` DESC')
            ->paginate(perPage: $perPage, page: $page);

        return $index;
    }

    public function mapIds($results)
    {
        dd(__METHOD__);
    }

    public function map(Builder $builder, $results, $model)
    {
        if ($results->isEmpty()) {
            return $model->newCollection();
        }

        $keys = $results->pluck('key');

        $models = $model->whereIn(
            $model->getKeyName(), $keys
        )->get()->keyBy($model->getKeyName());

        return $models;
    }

    public function getTotalCount($results)
    {
        return $results->total();
    }

    public function flush($model)
    {
        DB::table(Index::make()->getTable())->where('index', $model->searchableAs())->delete();
    }

    public function lazyMap(Builder $builder, $results, $model)
    {
        dd(__METHOD__);
        // TODO: Implement lazyMap() method.
    }

    public function createIndex($name, array $options = [])
    {
        dd(__METHOD__);
        // TODO: Implement createIndex() method.
    }

    public function deleteIndex($name)
    {
        DB::table(Index::make()->getTable())->where('index', $name)->delete();
    }

    protected function buildIndexQuery(Builder $builder)
    {
        $words = WordsService::prepareString($builder->query);
        $words = Word::getItems($words);

        $query = Index::query()
            ->where('index', $builder->model->searchableAs())
            ->whereIn('word_id', $words->modelKeys());

        return $query;
    }
}
