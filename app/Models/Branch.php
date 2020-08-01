<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public $table ='branchs';

    protected $fillable = [
       'branch_name','address','director_id','avatar','status',
    ];

    public function directorName()
    {
        return $this->belongsTo('App\Models\User' ,'director_id', 'id');
    }
}
