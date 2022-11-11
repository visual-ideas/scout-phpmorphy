<?php

namespace VI\ScoutPhpmorphy\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Link extends BaseModel
{
    protected $fillable = [

    ];

    public function words(): HasMany
    {
        return $this->hasMany(Word::class);
    }
}
