<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'type',
        'age_group_min',
        'age_group_max',
        'is_active',
        'website_url'
    ];

    public function getViewPathAttribute()
    {
        return "game.types.{$this->type}";
    }
}
