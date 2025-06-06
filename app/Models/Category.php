<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'description'];

    public function contents()
    {
        return $this->hasMany(Content::class, 'category_id', 'id');
    }
    
    public function getRouteKeyName()
{
    return 'slug';
}
}