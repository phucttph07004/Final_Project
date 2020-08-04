<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    //
        protected $fillable = [
            'fullname','date_of_birth','phone','address','is_active','email','note','branch_id'
        ];
}
