<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'type',
        'title',
        'intro',
        'user_id',
    ];

    protected $table = 'posts';
}
