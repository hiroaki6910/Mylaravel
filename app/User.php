<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //user_detailsテーブルとリレーションを結ぶ
    public function user_detail(){
        return $this->hasOne('App\User_detail', 'member_id');
    }
    
    //articlesテーブルとリレーションを結ぶ
    public function article(){
        return $this->hasMany('App\Article');
    }
    
    //messagesテーブルとリレーションを結ぶ
    public function message(){
        return $this->hasMany('App\Message');
    }
    
    //ローカルスコープ
    //public function scopeNameEqual($query, string $name = null)
    //{
    //    if(!$name){
    //        return $query;
    //   }

    //    return $query->where('name', 'like', '%'.$name.'%');
    //}
    
    //public function scopeSearchmember($request)
    //{
    //  $name = $request->name;
    //  $add =  implode(",", $request->add);
    //  $part = implode(",", $request->part);
    //  $genre = implode(",", $request->genre);
    //  $agemax = $request->agemax;
    //  $agemin = $request->agemin;
    //  $artist = $request->artist;
    //  $query = $this->with(['user_detail']);
        
    //  if (isset($name)) {
    //        $query->where('name', 'LIKE', '%'.$name.'%');
    //    }
        
    //    if (isset($add)) {
    //    $query->where('address', '=', '%'.$add.'%');
    //    }
        
    //    if (isset($part)) {
    //    $query->where('part', '=', '%'.$part.'%');
    //    }
        
    //    if (isset($genre)) {
    //    $query->where('genre', '=', '%'.$genre.'%');
    //    }
        
    //    if (isset($agemax)) {
    //    $query->where('age', '>=' , $agemax);
    //    }
        
    //    if (isset($agemin)) {
    //    $query->where('age', '<=' , $agemin);
    //    }
        
    //    if (isset($artist)) {
    //    $query->where('artist', 'like' , '%'.$artist.'%');
    //    }
        
    //    return $query->get();
    //}
}
