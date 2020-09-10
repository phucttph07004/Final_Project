<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'class_id','student_id','status'
    ];
}