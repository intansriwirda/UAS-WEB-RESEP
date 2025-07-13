<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'intan_recipes';

    protected $fillable = [
    'title',
    'description',
    'image',
    'category_id',
    'ingredients',
    'instructions',
    'cooking_time',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, 'recipe_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'recipe_id');
    }

    public function averageRating()
    {
        return round($this->reviews()->avg('rating'), 1);
    }


}
