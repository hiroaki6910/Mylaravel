<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Validator;
use App\User;
use App\User_detail;
use App\Article;
use App\Message;
use App\Message_User;
use DB;
use Response;
use Log;
use Session;

class MessageController extends Controller
{
    public function ShowMessage(Request $request)
    {
        $data = $request->all();
        return redirect()->action('MessageController@MessageHistory')->withInput();
    }
    
    //メッセージを送信し、データベースに登録
    public function PostMessage(Request $request)
    {
        DB::beginTransaction();
        try{
            $message = new Message;
        
            $message->user_id = $request->id;
            $message->content = $request->content;
            $message->save();
            $message->messageuser()->create([
            'sender_user_id' => $request->id,
            'recipient_user_id' => $request->recipient_id
            ]);
            DB::commit();
            $res = Response::make('0'); 
            //return response()->json(['res'=> $res]);
            return $res;
            
        }catch(Exception $e){
            DB::rollback();
            //return back()->withInput();
            $res = Response::make('1'); 
            //return response()->json(['res'=> $res]);
            return $res;
            }
        DB::commit();
        //return redirect('/message');
        //return view('/index', compact('message'));
    }
    
    //メッセージをやり取りしているユーザーの一覧を取得
    public function MessageHistory(Request $request)
    {
        $user = Auth::user()->id;
        
        $collection = Message_User::with(['senderUser' => function($query){$query->with('user_detail');},
        'recipientUser'=> function($query){$query->with('user_detail');},'message'])->where('sender_user_id', $user)
        ->orwhere('recipient_user_id',$user)->get(); //ログインユーザーがsender_userかrecipient_userのメッセージを絞り込む
        //dd($collection->ToArray());
        
        $tmp1=[];
        $tmp2=[];
        $history=[];
        
        foreach ($collection as $key => $value){
            //sender_user_idとrecipient_user_idの組み合わせが逆のパターンを回避
            if (!in_array($value['sender_user_id'], $tmp1, true)){
               $tmp1[] = $value['recipient_user_id']; 
            
                if (!in_array($value['recipient_user_id'], $tmp2, true)){
                $tmp2[] = $value['recipient_user_id'];
                $history[] = $value;
                }
            } 
        }
        $ModalData = Session::get('_old_input');
        //dd($ModalData);
        
        return view('/message', compact('history','ModalData')); 
       
    }
    
    //メッセージをやり取りしているユーザーの一覧取得（予備）
    public function MessageHistorys()
    {
        $user = Auth::user()->id;
        return Message_User::with(['otherUser'])->get();
        
        //return Message_User::with(['otherUser'])->get();
    }
    
    //メッセージタイムライン
    public function Messagedetail(Request $request)
    {
        $user = Auth::user()->id;
        
        $detail = Message_User::with(['senderUser' => function($query){$query->with('user_detail');}
            ,'recipientUser'=> function($query){$query->with('user_detail');}
                ,'message'=> function($query){$query->with('user');}])
                    ->where(function($query) use ($user,$request){
                        $query->where('sender_user_id', $user)
                              ->where('recipient_user_id',$request->id);
                    })->orWhere(function($query) use ($user,$request){
                        $query->where('recipient_user_id', $user)
                              ->where('sender_user_id',$request->id);
                    })->get();            
        
        return $detail;
    }
}
