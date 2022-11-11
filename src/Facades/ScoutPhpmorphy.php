<?php

namespace VI\ScoutPhpmorphy\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \VI\ScoutPhpmorphy\ScoutPhpmorphy
 */
class ScoutPhpmorphy extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \VI\ScoutPhpmorphy\ScoutPhpmorphy::class;
    }
}
