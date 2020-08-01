<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'level'
    ];
    public function CountClass()
    {
        return $this->hasMany('App\Models\Classroom', 'level_id', 'id');
    }
}
