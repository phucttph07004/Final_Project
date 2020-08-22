<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'fullname', 'email', 'address', 'phone', 'code', 'class_id', 'date_of_birth', 'avatar','status','password','fee_satus'
    ];
    public function ClassName()
    {
        return $this->belongsTo('App\Models\Classes', 'class_id', 'id');
    }
}
