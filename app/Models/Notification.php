<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'title', 'content', 'type','user_id','category_id',
    ];
    public function userName()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function categoryName()
    {
        return $this->belongsTo('App\Models\Category' ,'category_id', 'id');
    }
}
