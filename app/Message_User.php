<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Message_User extends Model
{
    protected $table = 'message_users';
    
    protected $fillable = [
        'message_id',
        'sender_user_id',
        'recipient_user_id',
    ];
    protected $casts = [
        'sender_user_id' => 'integer',
        'recipient_user_id' => 'integer'
    ];
    
    //usersテーブルとリレーションを結ぶ
    public function senderUser()
    {
        return $this->hasOne('App\User', 'id', 'sender_user_id');
    }
    
    //usersテーブルとリレーションを結ぶ
    public function recipientUser()
    {
        return $this->hasOne('App\User', 'id', 'recipient_user_id');
    }
    
    //DM相手を特定する
    /*
    public function otherUser() 
    {
        $user_id = Auth::id();
        //var_dump($user_id);
        //echo ($user_id);
        
        $other_key = "";
        
        //if (strcmp($user_id , $this->get(['sender_user_id']))==0){
        //    $other_key = 'recipient_user_id';
        //}else if (strcmp($user_id , $this->get(['recipient_user_id']))==0){
        //    $other_key = 'sender_user_id';
        //}
        
        //ログインユーザーが送信元の場合、recipient_user_idを参照する。
        //ログインユーザーが送信先の場合、sender_user_idを参照する。
        if ($user_id = $this->get(['sender_user_id'])){
            $other_key = 'recipient_user_id';
            //echo ($this->first(['sender_user_id']));
        }elseif ($user_id = $this->get(['recipient_user_id'])) {
            $other_key = 'sender_user_id';
        }
    
        //$sender_user = $this->get(['sender_user_id']);
        //$sender_user->toArray();
        //var_dump($sender_user);
        //$recipient_user = $this->get(['recipient_user_id']);
        //$recipient_user->toArray();
        
        //if ($this->contains('sender_user_id','$user_id')){
        //    $other_key = 'recipient_user_id';
        //}else{
        //    $other_key = 'sender_user_id';
        //}
        
        return $this->hasOne('App\User', 'id', $other_key);
    }
    */
    
    //messagesテーブルとリレーションを結ぶ
    public function message()
    {
        return $this->belongsTo('App\Message' , 'message_id');
    }
}
