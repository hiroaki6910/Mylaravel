<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
 
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\User_detail;
use App\Article;
use App\Message;
use App\Message_User;
use DB;
 
class MainController extends Controller
{
/*
|--------------------------------------------------------------------------
| メンバー
|--------------------------------------------------------------------------
*/
    //メンバー一覧ページ表示
    public function getIndex()
    {
        return view('index');
    }
    
    //メンバー一覧の検索ページ
    public function show_search_m()
    {
        $data = session()->all();
        return $data;
        return view('search_member' ,compact('$data'));
    }
    
    //メンバー一覧の取得
    public function showmember(Request $request)
    {
        //実装中↓
        //$show = User::nameEqual($request->name);

        //$show_m = User_detail::addEqual($request->add)
        //->partEqual($request->part)
        //->genreEqual($request->genre)
        //->genderEqual($request->gender)
        //->ageGreater($request->agemax)
        //->ageLessthan($request->agemin)
        //->artistEqual($request->artist)
        //->get();
        //dd($show_m->ToArray());
        
        //実装中↑
        
        //$show = User::with(['user_detail', 'article'])->get();
        //dd($show->ToArray());
        
        //$show = User::searchmember();
        //dd($show->ToArray());
        
        $name = $request->name;
        $add =  $request->add;
        $part = $request->part;
        $genre = $request->genre;
        $gender = $request->gender;
        $agemax = $request->agemax;
        $agemin = $request->agemin;
        $artist = $request->artist;
        
        DB::enableQueryLog();
        
        $show = User::query();
        
        if(isset($name)&&$name!==NULL){
        	$show->where('name','LIKE', '%'.$name.'%');
        }
        if(isset($add)&&$add!==NULL){
        	$show=User::whereHas('user_detail', function($query) use($add){
            return $query->where('address',$add);
        	});
        }
        if(isset($part)&&$part!==NULL){
        	$show=User::whereHas('user_detail', function($query) use($part){
            $query->where('part',$part);
             });
        }
        if(isset($genre)&&$genre!==NULL){
        	$show=User::whereHas('user_detail', function($query) use($genre){
            $query->where('genre',$genre);
            });
        }
        if(isset($gender)&&$gender!==NULL){
        	$show=User::whereHas('user_detail', function($query) use($gender){
            $query->where('gender', 'like', '%'.$gender.'%');
             });
        }
        if(isset($agemax)&&$agemax!==NULL){
        	$show=User::whereHas('user_detail', function($query) use($agemax){
            $query->where('age', '<=' , $agemax);
            });
        }
        if(isset($agemin)&&$agemin!==NULL){
        	$show=User::whereHas('user_detail', function($query) use($agemin){
            $query->where('age', '>=' , $agemin);
            });
        }
        if(isset($artist)&&$artist!==NULL){
        	$show=User::whereHas('user_detail', function($query) use($artist){
            $query->where('artist', 'like' , '%'.$artist.'%');
            });
        }
        
        $memberlist = $show->get();
        
        //dd(DB::getQueryLog());
        //dd($memberlist->ToArray());
        
        return view('index', compact('memberlist'));
    }
    
    //メンバーの詳細プロフィール表示（モーダル）
    public function modal(Request $request)
    {
        $data = User::with(['user_detail'])->where('id',$request->id)->get();
        return $data;
    }

/*
|--------------------------------------------------------------------------
| 記事
|--------------------------------------------------------------------------
*/
    //記事一覧ページ表示
    public function articlelist()
    {
        return view('index_articlelist');
    }
    
    //メンバー一覧の検索ページ
    public function show_search_a()
    {
        return view('search_article');
    }
    
    //記事一覧の取得
    /*
    public function showarticle(Request $request)
    {
        $show_article = Article::with(['user', 'user_detail'])->get();
        //dd($show_article->ToArray());
        return view('index_articlelist', compact('show_article'));
    }
    */
    
    //記事一覧の取得
    public function showarticle(Request $request)
    {
        $add =  $request->add;
        $part = $request->part;
        $genre = $request->genre;
        $direction = $request->direction;
        $day = $request->day;
        
    
        $show_article = Article::query(); 
        
        if(isset($add)&&$add!==NULL){
        	$show_article->where('area',$add);
        }
        
        if(isset($part)&&$part!==NULL){
        	$show_article->where('part',$part);
        }
        
        if(isset($genre)&&$genre!==NULL){
        	$show_article->where('genre',$genre);
        }
        
        if(isset($direction)&&$direction!==NULL){
        	$show_article->where('direction',$direction);
        }
        
        if(isset($day)&&$day!==NULL){
        	$show_article->where('day',$day);
        }
        
        $articlelist = $show_article->with(['user', 'user_detail'])->paginate(10);
        
        //dd($articlelist->ToArray());
        return view('index_articlelist', compact('articlelist'));
    }

    //送信先のユーザーIDを取得し、IDを元にユーザー詳細情報を取得
    public function sendmessage(Request $request)
    {
        //$destination = User::where('id',$id)->first();
        //dd($destination->ToArray());
        //return view('message', compact('destination'));
        
        //$tomessage = User::where('id',$request->destination_id)->first();
        //return response()->json(['tomessage'=> $tomessage]);
        //return redirect('message_react')->with('tomessage', User::where('id',$request->destination_id)->first());
        return User::where('id',$request->destination_id)->get();
        //$tomessage = User::where('id',$request->destination_id)->get();
        //return response()->json(['tomessage'=> $tomessage]);
    }
}