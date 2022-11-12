<?php

namespace VI\ScoutPhpmorphy\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Word extends Model
{
    public $timestamps = false;

    public int $count_words = 0;

    public bool $is_dictionary = false;

    public function getTable()
    {
        return config('scout-phpmorphy.table_prefix').'words';
    }

    protected $fillable = [
        'word',
    ];

    public function index(): HasMany
    {
        return $this->hasMany(Index::class);
    }

    public static function getOrCreateItems($array): Collection
    {
        $items = new Collection;

        foreach ($array as $wordItem) {
            $model = self::firstOrCreate(['word' => $wordItem['word']]);
            $model->count_words = $wordItem['count'];
            $model->is_dictionary = $wordItem['is_dictionary'];
            $items->push($model);
        }

        return $items;
    }

    public static function getItems($array): Collection
    {
        $items = new Collection;

        if (! empty($array)) {
            $items = self::query()
                ->when(array_filter($array, fn ($word) => $word['is_dictionary']),
                    fn (Builder $query, $words) => $query->whereIn('word', collect($words)->pluck('word')))
                ->when(array_filter($array, fn ($word) => ! $word['is_dictionary']),
                    function (Builder $query, $words) {
                        foreach ($words as $word) {
                            $query->orWhere('word', 'LIKE', $word['word'].'%');
                        }

                        return $query;
                    })
                ->get();
        }

        return $items;
    }
}
