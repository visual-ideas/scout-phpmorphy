<?php

namespace VI\ScoutPhpmorphy\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public $timestamps = false;

    public function setTable($table): void
    {
        $this->table = config('scout-phpmorphy.table_prefix').$table;
    }
}
