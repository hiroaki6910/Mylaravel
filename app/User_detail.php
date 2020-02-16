<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User_detail extends Model
{
    protected $fillable = [
        'member_id',
        'gender',
        'age',
        'address',
        'part',
        'genre',
        'artist',
        'community',
        'url',
        'introduction',
        'update_flag',
        'file_name'
    ];
    
    //articlesテーブルとリレーションを結ぶ(第二引数にarticlesの外部キーであるdetail_idを指定)
    public function article(){
        return $this->hasMany('App\Article', 'detail_id');
    }
    
    //ローカルスコープ
    //居住地
    //public function scopeAddEqual($query, string $add = null)
    //{
        //if(!$add){
        //    return $query;
        //}

        //return $query->where('address', 'like', '%'.$add.'%');
    //}
    
    //担当パート
    //public function scopePartEqual($query, string $part = null)
    //{
    //    if(!$part){
    //        return $query;
    //    }

    //    return $query->where('part', 'like', '%'.$part.'%');
    //}
    
    //好きなジャンル
    //public function scopeGenreEqual($query, string $genre = null)
    //{
    //    if(!$genre){
    //        return $query;
    //    }

    //    return $query->where('genre', 'like', '%'.$genre.'%');
    //}
    
    //性別
    //public function scopeGenderEqual($query, string $gender = null)
    //{
    //    if(!$gender){
    //        return $query;
    //    }

    //    return $query->where('gender', 'like', '%'.$gender.'%');
    //}
    
    //年齢(最大)
    //public function scopeAgeGreater($query, string $age = null)
    //{
    //    if(!$age){
    //        return $query;
    //    }

    //    return $query->where('age', '>=' , $age);
    //}
    
    //年齢(最小)
    //public function scopeAgeLessthan($query, string $age = null)
    //{
    //    if(!$age){
    //        return $query;
    //    }

    //    return $query->where('age', '<=' , $age);
    //}
    
    //好きなアーティスト
    //public function scopeArtistEqual($query, string $artist = null)
    //{
    //    if(!$artist){
    //        return $query;
    //    }

    //    return $query->where('artist', 'like' , '%'.$artist.'%');
    //}
    
}
