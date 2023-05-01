<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $table = 'downloads';
    protected $guarded = ['id'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
