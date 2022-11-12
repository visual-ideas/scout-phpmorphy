<?php

namespace VI\ScoutPhpmorphy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Index extends Model
{
    public $timestamps = false;

    public function getTable()
    {
        return config('scout-phpmorphy.table_prefix').'index';
    }

    protected $fillable = [
        'index',
        'key',
        'word_id',
        'count_words',
    ];

    public function word(): BelongsTo
    {
        return $this->belongsTo(Word::class);
    }
}
