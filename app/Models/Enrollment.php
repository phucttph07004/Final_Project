<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    //
        protected $fillable = [
            'fullname','date_of_birth','phone','address','status','email','slot','level_id'
        ];
}
