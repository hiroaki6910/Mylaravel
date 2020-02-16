<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'content'
    ];
        
    //usersテーブルとリレーションを結ぶ
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    //message_userテーブルとリレーションを結ぶ
    public function messageuser()
    {
        return $this->hasOne('App\Message_User' , 'message_id');
    }
}
