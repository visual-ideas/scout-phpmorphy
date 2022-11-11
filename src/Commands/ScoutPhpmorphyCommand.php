<?php

namespace VI\ScoutPhpmorphy\Commands;

use Illuminate\Console\Command;

class ScoutPhpmorphyCommand extends Command
{
    public $signature = 'scout-phpmorphy';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
