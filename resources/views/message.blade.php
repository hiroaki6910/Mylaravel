@extends('main')

@section('content')
    <div id="" style="height:1000px;padding-left:0px; text-align:left;">
        <div style="width:309px; display:inline-block; vertical-align: top;">
            <div style="margin-left:3px;">メッセージ履歴</div>
            @foreach ($history as $history)
            <div style="border-bottom: 1px solid #ccc; width:310px;">
                <form action="" method="post" name="ms">
                    @csrf
                    
                    @if(Auth::user()->id == $history->senderUser->id)
                    <input type="button" class="btn" name="destination_name" value="{{$history->recipientUser->name}}">
                    @elseif(Auth::user()->id == $history->recipientUser->id)
                    <input type="button" class="btn" name="destination_name" value="{{$history->senderUser->name}}">
                    @endif
                    
                    @if(Auth::user()->id == $history->senderUser->id)
                    <input type="hidden" class="o_id" name="destination_id" data-target="" value="{{$history->recipientUser->id}}">
                    @elseif(Auth::user()->id == $history->recipientUser->id)
                    <input type="hidden" class="o_id" name="destination_id" data-target="" value="{{$history->senderUser->id}}">
                    @endif
                
                    <input type="hidden" class="logus" value="{{Auth::user()->id}}">
                </form>
                <!--
                <div>{{$history->message->content}}</div>
                <div>{{$history->message->created_at}}</div>
                -->
            </div>
            @endforeach
        </div>
            
        <div style="display:inline-block; height:1000px; max-width:485px;">
            <div id="your_container" >
                <!-- チャットの外側部分① -->
                <div id="bms_messages_container">
                    <!-- ヘッダー部分② -->
                    <div id="bms_chat_header">
                        <!--ステータス-->
                        <div id="bms_chat_user_status">
                            <!--ステータスアイコン
                            <div id="bms_status_icon">●</div>
                            -->
                            <!--ユーザー名-->
                            <div id="bms_chat_user_name"></div>
                            <div></div>
                        </div>
                    </div>        
                                        
                    <!-- タイムライン部分③ -->
                    <div id="bms_messages">
                    </div>
                        
                    <!-- メッセージ入力、送信ボタン④-->  
                    <div id="bms_send">
                        <form action="" method="post">
                            @csrf
                            <textarea id="bms_send_message" name="content" rows="5" cols="50">メッセージ入力</textarea>
                            <input class = "btnbtn-primary" id="bms_send_btn" type="submit" value="送信">
                            <input type="hidden" id ="id" name="id" value="{{ Auth::user()->id }}">
                            <input type="hidden" id="postmes" name="recipient_id">
                            <span id="span1"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                
                //プロフィール詳細のモーダルからメッセージを送る場合
                if('{{$ModalData["mordal_user_id"]}}'){
                    //メッセージ送信先ユーザーID
                    var mordal_user_id = '{{$ModalData["mordal_user_id"]}}';
                    $('#postmes').val(mordal_user_id);
                
                    //ログインユーザーID
                    var login_user_id = '{{$ModalData["login_user_id"]}}';
                
                    //メッセージ送信先ユーザー名
                    var mordal_user_name ='{{$ModalData["mordal_user_name"]}}'
                    $('#bms_chat_user_name').text(mordal_user_name);
                
                //メッセージ履歴のリンクからページ遷移した場合
                }else{
                    //メッセージ送信先ユーザーのID
                    var mordal_user_id = $('.o_id').val();
                    //メッセージ送信先ユーザーのIDを送信時にhiddenで送るために、value値にセット
                    $('#postmes').val(mordal_user_id);
                
                    //ログインユーザーのID
                    var login_user_id = $('.logus').val();
                
                    var distination = $('.btn').val();
                    $('#bms_chat_user_name').text(distination); 
                    console.log(distination);    
                }
                
                $.ajax({
                        type:"POST",
                        url:"{{url('/api/message')}}",
                        data:{
                            _token  :CSRF_TOKEN,
                            id      :mordal_user_id
                        },
                        dataType: 'json'
                }).done(function (results) {
                    console.log(results);
                    for(var i in results){
                        //sender_user_idがログインユーザーIDと同じである場合
                        if(results[i].sender_user_id==login_user_id){
                        //自分が送っているメッセージ
                            var cts ="";
                                cts =  "<div class='bms_message bms_right'>";
                                cts += "<div class='bms_message_box'>";
                                cts += "<div class='bms_message_content'>";
                                cts += "<div class='bms_message_text'>"+ results[i].message.content + "</div>";
                                cts += "</div>";
                                cts += "</div>";
                                cts += "<div class='date'>"+ results[i].created_at + "</div>";
                                cts += "</div>";
                        }else{
                        //相手から送られてきているメッセージ
                            var cts ="";
                                cts =  "<div class='bms_message bms_left'>";
                                cts += "<span style='display:inline-block;'>"
                                cts += "<img id ='cmg' src='/storage/normal' style='width:30px; height:30px;'>";
                                cts += "</span>";
                                cts += "  <span>"+ results[i].message.user.name + "</span>";
                                cts += "<div class='bms_message_box'>";
                                cts += "<div class='bms_message_content'>";
                                cts += "  <div class='bms_message_text'>"+ results[i].message.content + "</div>";
                                cts += "</div>";
                                cts += "</div>";
                                cts += "  <div class='date'>"+ results[i].created_at + "</div>";
                                cts += "</div>";
                        }
                        $('#bms_messages').append(cts);
                    }
                }).fail(function (err) {
                        alert('データの取得に失敗しました。');
                });
            });
        
            //履歴一覧のユーザー名をクリックで、メッセージ履歴を表示させるための処理
            $(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $('.btn').on('click',function(){
                    //要素を空にする
                    $('#bms_messages').empty();
                    var $p = $( this ).parent();
                    var mainType = $p.find( '.o_id' );
                    //メッセージ送信先ユーザーのID
                    var otheruser = mainType.val();
                    //メッセージ送信先ユーザーのIDを送信時にhiddenで送るために、value値にセット
                    $('#postmes').val(otheruser);
                    
                    var mainType2 = $p.find( '.logus' );
                    //ログインユーザーのID
                    var loginuser = mainType2.val();
                    
                    var mainType3= $p.find('.btn');
                    var distination = mainType3.val();
                    $('#bms_chat_user_name').text(distination);
                    
                    //ログの確認
                    console.log(otheruser);
                    console.log(loginuser);
                    
                    $.ajax({
                        type:"POST",
                        url:"{{url('/api/message')}}",
                        data:{
                            _token: CSRF_TOKEN,
                            id  :otheruser
                        },
                        dataType: 'json'
                        
                    }).done(function (results) {
                        //alert("success!");
                        //console.log(results);
                        //メッセージ送信先のユーザー名を取得
                        //$('#bms_chat_user_name').text(results[0]["other_user"]["name"]);
                        //$('#name').text(results[0]["other_user"]["name"]);
                        //プロフィール写真のパスを置換する処理
                        //var changeL = $('#cmg').attr('src').replace('normal' , results[0]["other_user"]["user_detail"]["file_name"]);
		                //$('#cmg').attr('src', changeL);
		                
		                //for (var key in results) {
                        //console.log(key);
                        //$('.bms_message_text').text(results[key]["message"]["content"]);
                        //}
                        
                        //$.each(results, function(index, result){
                        //    console.log(result.message.content);
                            
                        //    $('<div></div>').append(result.message.user.name+ ':'+result.message.content).appendTo('.bms_message_text');
                        //});
                        
                        for(var i in results){
                            //sender_user_idがログインユーザーIDと同じである場合
                            if(results[i].sender_user_id==loginuser){
                                //自分が送っているメッセージ
                                
                                //var ctus ="";
                                //ctus ="<div id='bms_chat_user_name'>";
                                //ctus += "<span>"+results[i].recipient_user.name+ "</span>";
                                //ctus += "</div>";
                                
                                var cts ="";
                                cts =  "<div class='bms_message bms_right'>";
                                cts += "<div class='bms_message_box'>";
                                cts += "<div class='bms_message_content'>";
                                cts += "<div class='bms_message_text'>"+ results[i].message.content + "</div>";
                                cts += "</div>";
                                cts += "</div>";
                                cts += "<div class='date'>"+ results[i].created_at + "</div>";
                                cts += "</div>";
                            }else{
                                //相手から送られてきているメッセージ
                                //var ctus ="";
                                //ctus ="<div id='bms_chat_user_name'>";
                                //ctus += "<span>"+results[i].sender_user.name+ "</span>";
                                //ctus += "</div>";
                                
                                var cts ="";
                                cts =  "<div class='bms_message bms_left'>";
                                cts += "<span style='display:inline-block;'>"
                                cts += "<img id ='cmg' src='/storage/normal' style='width:30px; height:30px;'>";
                                cts += "</span>";
                                cts += "  <span>"+ results[i].message.user.name + "</span>";
                                cts += "<div class='bms_message_box'>";
                                cts += "<div class='bms_message_content'>";
                                cts += "  <div class='bms_message_text'>"+ results[i].message.content + "</div>";
                                cts += "</div>";
                                cts += "</div>";
                                cts += "  <div class='date'>"+ results[i].created_at + "</div>";
                                cts += "</div>";
                            }
                            
                            $('#bms_messages').append(cts);
                            //var changeL = $('#cmg').attr('src').replace('normal' , results[i].other_user.user_detail.file_name);
		                    //$('#cmg').attr('src', changeL);
                        }
		                //メッセージを送信するユーザーのIDをセット
		                //$('#postmes').val('results[0]["other_user"]["id"]');
                    }).fail(function (err) {
                        alert('データの取得に失敗しました。');
                    });
                    //$('.btn').off('click');
                    //location.reload();
                });
                                                                                                                                
            
            //メッセージタイムライン
                $('#bms_send_btn').on('click',function(event){
                    event.preventDefault();
                    var $m = $(this).parent();
                    var mainType4 = $m.find( '#id' );
                    var id = mainType4.val();
                    
                    var mainType5 = $m.find( '#postmes' );
                    var recipient_id = mainType5.val();
                    
                    var mss = $m.find( '#bms_send_message' );
                    var content = mss.val();
                    
                    $.ajax({
                        type:"POST",
                        url:"{{url('/message')}}",
                        data:{
                            _token       : CSRF_TOKEN,
                            id           :id,
                            recipient_id :recipient_id,
                            content      : content
                        },
                        dataType: 'json'
                    }).done(function (res) {
                        //alert("success!");
                        console.log(res);
                        if(res==0){
                        var now = new Date();
                        var plusmess = ""
                        plusmess =  "<div class='bms_message bms_right'>";
                        plusmess += "<div class='bms_message_box'>";
                        plusmess += "<div class='bms_message_content'>";
                        plusmess += "<div class='bms_message_text'>"+ content + "</div>";
                        plusmess += "</div>";
                        plusmess += "</div>";
                        plusmess += "<div class='date'>"+ now + "</div>";
                        plusmess += "</div>";
                        $('#bms_messages').append(plusmess);
                        }
                        else if(res==1){
                        alert('失敗しました');    
                        }
                    }).fail(function (err) {
                        alert('データの取得に失敗しました。');
                    });
                    return false; 
                });
            });
        </script>
    </div>
@endsection
