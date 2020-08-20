<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public $table ='feedback';

    public function studentName()
    {
        return $this->belongsTo('App\Models\Student','student_id','id');
    }
    
}
