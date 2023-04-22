<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'users';
    protected $guarded = ['id'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
