<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $guarded = ['id'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public string $file_name;
    public string $title;
    public string $subject;
    public string $topic;
    public int $time;
    public int $difficulty_level;
    public string $type;
    public int $num_of_downloads;

}
