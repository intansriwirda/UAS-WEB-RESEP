<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'intan_admins';

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];
}
