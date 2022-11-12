<?php

namespace VI\ScoutPhpmorphy\Services;

class StringService
{

    public static function toArray(string $string)
    {
        $string = strip_tags($string);
        return preg_split('/((^\p{P}+)|(\p{P}*\s+\p{P}*)|(\p{P}+$))/', $string);
    }
}
