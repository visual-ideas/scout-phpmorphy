<?php

namespace VI\ScoutPhpmorphy\Services;

use cijic\phpMorphy\Facade\Morphy;

class WordsService
{

    public static function prepareString(string $string)
    {
        $words = StringService::toArray($string);

        return self::prepare($words);
    }

    public static function prepareArray(array $array)
    {
        $words = ArrayService::flatten($array);

        return self::prepare($words);
    }

    protected static function prepare(array $array)
    {
        $words = collect($array)->filter()->map(function ($word) {
            return StringService::toArray($word);
        });
        $words = ArrayService::flatten($words);
        $words = collect($words)
            ->map(fn($word) => str($word)->upper()->trim()->toString())
            ->filter()
            ->filter(fn($word) => str($word)->length() >= 2);

        $morphy = new \cijic\phpMorphy\Morphy();

        $words = $words->map(function ($word) use ($morphy) {
            $array = [
                [
                    'is_dictionary' => false,
                    'word'          => $word,
                ],
            ];
            if ($morphyWord = $morphy->getPseudoRoot($word)) {
                $array = [];
                foreach ($morphyWord as $morphyWordNew) {
                    $array[] = [
                        'is_dictionary' => true,
                        'word'          => $morphyWordNew,
                    ];
                }
            }
            return $array;
        });

        $words = $words->toArray();

        $temp = [];

        foreach ($words as $wordItems) {
            foreach ($wordItems as $word) {
                $temp[] = $word;
            }
        }

        $words = [];

        foreach ($temp as $wordItems) {
            $wordItems['word'] = trim($wordItems['word']);
            if ($wordItems['word']) {
                if (!isset($words[$wordItems['word']])) {
                    $words[$wordItems['word']] = $wordItems;
                    $words[$wordItems['word']]['count'] = 0;
                }
                $words[$wordItems['word']]['count']++;
            }
        }

        return array_values($words);
    }
}
