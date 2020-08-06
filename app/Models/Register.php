<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    //
        protected $fillable = [
            'fullname','date_of_birth','phone','address','level','is_active','email','note'
        ];
}