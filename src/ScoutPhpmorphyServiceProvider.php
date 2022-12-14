<?php

namespace VI\ScoutPhpmorphy;

use Laravel\Scout\EngineManager;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use VI\ScoutPhpmorphy\Engines\ScoutPhpmorphyEngine;

class ScoutPhpmorphyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('scout-phpmorphy')
            ->hasConfigFile()
            ->hasMigrations(['create_phpmorphy_words_table', 'create_phpmorphy_index_table']);
    }

    public function boot()
    {
        parent::boot();

        resolve(EngineManager::class)->extend('phpmorphy', function () {
            return new ScoutPhpmorphyEngine;
        });
    }
}
