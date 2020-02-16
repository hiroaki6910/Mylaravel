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
        return view('article_edt');
    }
    
    //ログインしているユーザーのID,ユーザーのプロフィール情報を取得
    public function usid(Request $request)
    {
        //ログインしているユーザーのIDを取得
        $user = Auth::user();
        //dd($user->ToArray());
        //取得したIDのユーザーのプロフィール情報を取得(user_detailsのidを取得するため)
        $userdetail_id = User_detail::where('member_id', $user->id)->get();
        //dd($userdetail_id->ToArray());
            return view('article_edt', compact('user', 'userdetail_id'));
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
}