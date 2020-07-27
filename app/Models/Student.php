<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'fullname', 'email', 'address', 'phone', 'code', 'class_id', 'date_of_birth', 'avatar','is_active',
    ];
}
