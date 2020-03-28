<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\User_detail;
use App\Article;

class PostArticleController extends Controller
{
    //記事投稿画面を表示
    public function articleindex()
    {
        return view('article_dsp');
    }
    
    //ログインしているユーザーのID,ユーザーのプロフィール情報を取得
    public function usid(Request $request)
    {
        //ログインしているユーザーのIDを取得
        $user = Auth::user();
        //dd($user->ToArray());
        //取得したIDのユーザーのプロフィール情報を取得(user_detailsのidを取得するため)
        $userdetail = User_detail::where('member_id', $user->id)->get();
        //dd($userdetail_id->ToArray());
            return view('article_dsp', compact('user', 'userdetail'));
    }
    
    //記事を登録
    public function ArticleRegist(Request $request)
    {
        $article = new Article;
        
        $article->user_id = $request->id;
        $article->detail_id = $request->detail_id;
        $article->title = $request->title;
        $article->area = implode(",", $request->area);
        $article->day = $request->day;
        $article->direction = $request->direction;
        $article->articleage = $request->articleage;
        $article->part = implode(",", $request->part);
        $article->genre = implode(",", $request->genre);
        $article->song = $request->song;
        $article->demo = $request->demo;
        $article->content = $request->content;
        $article->save();
        return redirect('/profile');
    }
    
    //記事修正画面を表示・記事情報の取得
    public function articleindex_edt(Request $request)
    {
        //ログインしているユーザーのIDを取得
        $user = Auth::user();
    
        //取得したIDのユーザーのプロフィール情報を取得(user_detailsのidを取得するため)
        $userdetail = User_detail::where('member_id', $user->id)->get();
        
        //記事のIDを取得
        $value = $request->input('id');
        //print_r($value);
        
        $articleinfo = Article::where('id', $value)->get();
        //dd($articleinfo->ToArray());
        $area =  explode(",", $articleinfo['0']['area']);
        $part =  explode(",", $articleinfo['0']['part']);
        $genre =  explode(",", $articleinfo['0']['genre']);
        //print_r($area);
        return view('article_edt', compact('user', 'userdetail','value','articleinfo','area','part','genre'));
    }
    
    //アップデート処理
    public function updateArticle(Request $request)
    {
    $updateart = Article::where('id',$request->article_id)->first();
    
    $updateart->user_id = $request->id;
    $updateart->detail_id = $request->detail_id;
    $updateart->title = $request->title ;
    $updateart->area = implode(",", $request->area);
    $updateart->day = $request->day;
    $updateart->direction = $request->direction;
    $updateart->articleage = $request->articleage;
    $updateart->part = implode(",", $request->part);
    $updateart->genre = implode(",", $request->genre);
    $updateart->song = $request->song;
    $updateart->demo = $request->demo;
    $updateart->content = $request->content;
    $updateart->save();
    return redirect('/profile');
    }
}