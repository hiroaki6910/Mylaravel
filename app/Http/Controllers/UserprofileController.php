<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\User_detail;
use App\Article;
use App\Message;
use App\Message_User;

class UserprofileController extends Controller
{   
    //＊＊＊＊＊＊マイページ＊＊＊＊＊＊
    //プロフィール画面を表示
    public function getTop()
    {
        return view('profile');
    }
    
    //プロフィール画像アップロード処理
    public function create(Request $request)
    {
        //バリデーション
        
        //バリデーションチェック
        //if ($this->fails()) {
        //    return redirect('profile')->with('message', 'ファイルを確認してください！');
        //}
            
        if ($request->file('image_file')->isValid()) {
 
            $path = $request->image_file->store('public'); //1.ファイルの保存
            
            $id = Auth::id(); //2.ログインしているユーザーのIDを取り出す
            $image = User_detail::where('member_id' ,$id)->first();//3.ログインしているユーザーのfile_nameカラムにプロフィール画像のファイル名を挿入する。
            $image->file_name = basename($path);
            $image->save();
            //dd($image->ToArray());
            return redirect('/profile');
        }
        else{
            return redirect('/profile')->with('message', 'ファイルを確認してください！');  
        }
        //return view('/profile', compact('image'));
        //dd($image->ToArray());
    }
    
    //データベースからログインユーザーのプロフィール情報を取得するための関数
    public function profile_afterEdt(Request $request)
    {
        $user_id = Auth::id(); //1.ログインしているユーザーのIDを取り出す
        $profAftEdt = User::find($user_id); //2.取り出したログインユーザーIDを元にプロフィール情報を取得(user_detailsテーブル(プロフィール情報)とはhasOneでリレーションを結んでいるので、自動的に値を取得できる。)
        $articles = Article::where('user_id' ,$user_id)->get();//3.ログインユーザー を元に外部キーを指定し、募集記事情報を取得
        //変数の中身確認用
        //dd($articles->ToArray());
            return view('/profile', compact('profAftEdt','articles'));
    }
    
    //＊＊＊＊＊＊プロフィール修正画面＊＊＊＊＊＊
    //プロフィール修正画面を表示
    public function profile_edt()
    {
        return view('profile_edt');
    }
    
    //データベースからログインユーザーのプロフィール情報を取得するための関数
    public function profile(Request $request)
    {
        $user_id = Auth::id(); //1.ログインしているユーザーのIDを取り出す
        $uspro = User::with(['user_detail'])->find($user_id); //2.取り出したログインユーザーIDを元にプロフィール情報を取得(user_detailsテーブル(プロフィール情報)とはhasOnedeでリレーションを結んでいるので、自動的に値を取得できる。)
        $us_part = explode(",", $uspro->user_detail->part);
        $us_genre = explode(",", $uspro->user_detail->genre);
        //print_r($us_part);
        //print_r($us_genre);
        //dd($uspro->ToArray());
        
        return view('profile_edt', compact('uspro','us_part','us_genre'));
    }
    
    //アップデート処理
    public function update(Request $request)
    {
    $updatepro = User_detail::where('member_id',$request->id)->first();
    
    $updatepro->gender = $request->sex;
    $updatepro->age = $request->age;
    $updatepro->address = $request->add;
    $updatepro->part = implode(",", $request->part);
    $updatepro->genre = implode(",", $request->genre);
    $updatepro->artist = $request->artist;
    $updatepro->community = $request->community;
    $updatepro->url = $request->url;
    $updatepro->introduction = $request->intro;
    $updatepro->update_flag = $request->update_flag;
    $updatepro->save();
    
    return redirect('/profile');
    }
    
    
    //reactテスト用
    //public function react()
    //{
    //$history = Message_User::with(['user'])->get();
    //return response()->json($history);
    //$user = Auth::user();
    //$history = Message_User::with(['recipientUser','message'])->where('sender_user_id', $user->id )
    //    ->orwhere('recipient_user_id',$user->id)->get(); //ログインユーザーがsender_userかrecipient_userのメッセージを絞り込む
        //dd($history->ToArray());
        //return view('/message_r', compact('history')); 
        //return response()->json(['history'=> $history]);//jsonで結果を返す場合
    //return $history;
    
    //retune User::all();
    //}
}