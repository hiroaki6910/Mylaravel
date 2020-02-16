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
        //return view('message');
        $data = $request->all();
        return redirect()->action('MessageController@MessageHistory')->withInput();
    }
    
    //メッセージを送信し、データベースに登録
    public function PostMessage(Request $request)
    {
        //$message = new Message;
        
        //$message->user_id = $request->id;
        //$message->content = $request->content;
        //$message->save();
        
        //$message->messageuser()->create([
        //    'sender_user_id' => $request->id,
        //    'recipient_user_id' => $request->recipient_id
        //    ]);
        //dd($message->ToArray());
        //return redirect('/message');
        //return view('/main', compact('message'));
        
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
        
        //旧
        //$history = Message_User::with(['otherUser' => function($query){$query->with('user_detail');},'message'])->where('sender_user_id', $user)
        //->orwhere('recipient_user_id',$user)->get(); //ログインユーザーがsender_userかrecipient_userのメッセージを絞り込む
        //dd($history->ToArray());
        
        //新 otherUserのリレーションを使わない方向
        $collection = Message_User::with(['senderUser' => function($query){$query->with('user_detail');},
        'recipientUser'=> function($query){$query->with('user_detail');},'message'])->where('sender_user_id', $user)
        ->orwhere('recipient_user_id',$user)->get(); //ログインユーザーがsender_userかrecipient_userのメッセージを絞り込む
        //dd($collection->ToArray());
        
        //$c = count($history);
        
        $tmp1=[];
        $tmp2=[];
        $history=[];
        //$history1=[];
        
        foreach ($collection as $key => $value){
            //sender_user_idとrecipient_user_idの組み合わせが逆のパターンを回避
            if (!in_array($value['sender_user_id'], $tmp1, true)){
               $tmp1[] = $value['recipient_user_id']; 
                //
                if (!in_array($value['recipient_user_id'], $tmp2, true)){
                $tmp2[] = $value['recipient_user_id'];
                $history[] = $value;
                }
            } 
            //$history1[]= $value;
            //print('配列の中に'.$value['recipient_user_id'].'は見つかりま<br>');
            //else{
            //print('配列の中に'.$value['recipient_user_id'].'は見つかりません<br>');
            //}
        }
        //print_r($history1);
        //dd($history);
        //return $history;
        //return $history1;
        
        $ModalData = Session::get('_old_input');
        //$ModalData = $request->old();
        //dd($ModalData);
        
        return view('/message', compact('history','ModalData')); 
       
         /*
        $history = $history0->groupBy('senderUser.name');
        $historys = $history0->groupBy('recipientUser.name');
            //->transform(function ($order_detail) {
            //return $order_detail->groupBy('recipient_user_id')
            //->values(); // valuesは用途に応じてお好みで。詳細は問2参照。
        //});
        */
        
        
        //$marge = $history->combine($historys);
        //dd($history->ToArray());
        //dd($historys->ToArray());
        //dd($$marge->ToArray());
        
        //$historys = count($history);
        
        /*
        if($history->contains('sender_user_id','22')){
            echo 'AAAAA';
        }
        */
        
        /*
        foreach ($history as $key => $value){
            if ($history->contains('sender_user_id','$value->sender_user_id')){
                echo 'AAAAA';
            }
            else{
                echo 'BBBB';
            }
        }
        */
        
        /*
        $historys = count($history);
        
        for ($i=0; $i < $historys; $i++) {
            //$var=array($history[$i]->sender_user_id,$history[$i]->recipient_user_id);
            //print_r($history[$i]->sender_user_id);
            //$vars = count($var);
            if ($history->search('sender_user_id','$history[$i]->sender_user_id')){
                print_r($history[$i]->sender_user_id);
                continue;
            }else{
                print_r($history[$i]->recipientUser->name.":".$history[$i]->senderUser->name.";;");  
            }
        }
        */
    
         /*
        $data = $history->pluck("sender_user_id");
        
        print_r($data);
        */
        
    /*
        //$dict=[];
        $history->each(function ($item,$key){
            Log::info($item);
            //return false;
            //echo 'BBBB';
            
        });
    */    
        //return $history;
        //dd($item);
    
        
        //print_r($history[$i]->sender_user_id.":");
        //print_r($history[$i]->recipient_user_id.":");
        
    
        /*
        $history1 = $collection->unique('sender_user_id');
        $history2 = $collection->unique('recipient_user_id');
        $history = $history1->concat($history2);
        */
        
        //$history = $collection->groupBy('sender_user_id');
        //dd($history->ToArray());
        
        
        /*
        $tmp1 = [];
        $history1 = [];
        
        foreach ($allHistory as $allHistory){
            if (!in_array($allHistory['sender_user']['id'], $tmp1)) {
                $tmp1[] = $allHistory['sender_user']['id'];
                $history1[] = $allHistory;
            }
        }
        
        $tmp2 = [];
        $history2 = [];
        
        foreach ($allHistory as $allHistory){
            if (!in_array($allHistory['recipient_user']['id'], $tmp2)) {
                $tmp2[] = $allHistory['recipient_user']['id'];
                $history2[] = $allHistory;
            }
        }
        
        //return $history1;
        return $history2;
        */
        
        //$unique = unique($history);
        //$history->unique('name')->get();
        //$history -> groupBy('user_id')->get();
        //return response()->json(['history'=> $history]);//jsonで結果を返す場合
        //var_dump($history);
        //return $history;
        
        /*重複回避策
        $tmp = array();
        $array_result = array();

        foreach($history as $key => $value){

            配列に値が見つからなければ$tmpに格納
            if( !in_array( $value['otherUser']['name'], $tmp ) ) {
                $tmp[] = $value['name'];
                $array_result[] = $value;
            }
        }
        $data = $array_result;
        return view('/message', compact('data'));
        
        
        /*重複回避策
        $uni = $history->ToArray();
        $data = $uni->unique('other_use');
        return view('/message', compact('data'));
        
        $array = json_decode(json_encode($history), true);
        dd($array->ToArray());
        $data = array_reduce($array, function($carry, $item) {
            if (!in_array($item, $carry)) {
                $carry[] = $item;
            }
            return $carry;
        }, []);
        dd($data->ToArray());
        var_dump($data);
        return view('/message', compact('data'));
        */
        
        /*重複回避策
        $uniqueArray = [];
        foreach($history as $key => $value) {
            if (!in_array($value, $uniqueArray)) {
            $uniqueArray[$key] = $value;
            }
        }
        return $uniqueArray;
        return view('/message', compact('data'));
        */
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
        //$detail = Message_User::with(['otherUser' => function($query){$query->with('user_detail');},'message'])->where('sender_user_id', $user)
        //->where('recipient_user_id',$request->id)->get();
        
        /*旧
        $detail = Message_User::with(['otherUser' => function($query){$query->with('user_detail');}
            ,'message'=> function($query){$query->with('user');}])
                    ->where(function($query) use ($user,$request){
                        $query->where('sender_user_id', $user)
                              ->where('recipient_user_id',$request->id);
                    })->orWhere(function($query) use ($user,$request){
                        $query->where('recipient_user_id', $user)
                              ->where('sender_user_id',$request->id);
                    })->get();
        */
        //新           
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
        //dd($detail->ToArray());
        //return view('/message', compact('detail'));
        //return view('/message')->json($detail);
       
    }
    
    //public function postIndex(Request $request)
    //{
    //    $all = Request::all();
        //dd($all);
        //return view('/message', compact('all'));
        //  return response()->json($all);
    //}
    
    //public function show()
    //{
    //$test= Message::with(['messageuser'])->get();
    //dd($test->ToArray());
    //}
}
