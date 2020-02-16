<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'area',
        'day',
        'direction',
        'articleage',
        'part',
        'genre',
        'song',
        'demo',
        'content',
        'detail_id'
    ];
    
    public function user_detail(){
        return $this->belongsTo('App\User_detail' ,'detail_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
