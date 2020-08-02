<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $fillable = [
        'title',
        'content',
        'type',
        'image',
        'status',
        'user_id',

    ];
}
