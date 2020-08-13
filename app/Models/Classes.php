<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'name','user_id','teacher_id','level_id', 'course_id', 'status','number_of_sessions','start_date','finish_date'
    ];

    public function userName()
    {
        return $this->belongsTo('App\Models\User', 'user_id','id');
    }

    public function courseName()
    {
        return $this->belongsTo('App\Models\Course', 'course_id','id');
    }

    public function teacherName()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function levelName()
    {
        return $this->belongsTo('App\Models\Level', 'level_id','id');
    }

}
