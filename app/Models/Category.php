<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'intan_categories'; // ini WAJIB jika nama tabel kamu ada prefix
    protected $fillable = ['name'];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
