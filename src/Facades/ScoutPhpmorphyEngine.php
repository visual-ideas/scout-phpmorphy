<?php

namespace VI\ScoutPhpmorphy\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \VI\ScoutPhpmorphy\Engines\ScoutPhpmorphyEngine
 */
class ScoutPhpmorphyEngine extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \VI\ScoutPhpmorphy\Engines\ScoutPhpmorphyEngine::class;
    }
}
