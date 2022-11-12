<?php

namespace VI\ScoutPhpmorphy\Services;

class ArrayService
{
    public static function flatten($array): array
    {

        $result = [];

        foreach ($array as $value) {
            if (is_scalar($value)) {
                $result[] = $value;
            } else {
                foreach (self::flatten((array)$value) as $subValue) {
                    $result[] = $subValue;
                }
            }
        }

        return $result;
    }
}
