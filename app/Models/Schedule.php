<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'user_id','student_id','level_id', 'class_id','weekday','slot','teacher_id','time',
    ];
}
