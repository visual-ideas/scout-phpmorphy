<?php

namespace VI\ScoutPhpmorphy;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use VI\ScoutPhpmorphy\Commands\ScoutPhpmorphyCommand;

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
            ->hasViews()
            ->hasMigration('create_scout-phpmorphy_table')
            ->hasCommand(ScoutPhpmorphyCommand::class);
    }
}
