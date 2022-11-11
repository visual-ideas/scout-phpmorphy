<?php

namespace VI\ScoutPhpmorphy\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Word extends BaseModel
{

    protected $fillable = [
        'word',
    ];

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

}
