@extends('main')

@section('content')
    <div id="" style="height:1000px;padding-left:0px; text-align:left;">
        <div style="width:309px; display:inline-block; vertical-align: top;">
            <div style="margin-left:3px;">メッセージ履歴</div>
            @if(!isset($history[0]))
                <div>メッセージのやり取りをしているメンバーはいません</div>
            @endif
            @foreach ($history as $history)
            <div style="border-bottom: 1px solid #ccc; width:310px; height:67px;">
                <form action="" method="post" name="ms">
                    @csrf
                    @if(Auth::user()->id == $history->senderUser->id)
                    <img src="/storage/{{$history->recipientUser->user_detail->file_name}}" alt="logo" style="width:55px; height:55px; margin-left:3px; position:relative; top:5px;">
                    <input type="button" class="btn" name="destination_name" value="{{$history->recipientUser->name}}" style="padding-left: 5px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px; vertical-align:top;">
                    <div style="font-stretch: condensed; color: gray; position: relative; top: -31px; left: 65px; width: 205px; font-size: 12px;">{{$history->message->content}}</div>
                    <div style="margin-left: 3px; position: relative; top:-33px; left:63px; font-size:12px;">{{$history->message->created_at->format('n/j G:i')}}</div>
                    @elseif(Auth::user()->id == $history->recipientUser->id)
                    <img src="/storage/{{$history->senderUser->user_detail->file_name}}" alt="logo" style="width:55px; height:55px; margin-left:3px; position:relative; top:5px;">
                    <input type="button" class="btn" name="destination_name" value="{{$history->senderUser->name}}" style="padding-left: 5px; padding-right: 0px; padding-bottom: 0px; padding-top: 0px; vertical-align:top;">
                    <div style="font-stretch: condensed; color: gray; position: relative; top: -31px; left: 65px; width: 205px; font-size: 12px;">{{$history->message->content}}</div>
                    <div style="margin-left: 3px; position: relative; top:-33px; left:63px; font-size:12px;">{{$history->message->created_at->format('n/j G:i')}}</div>
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
                            var post_time = new Date(results[i].created_at);
                            console.log(post_time);
                            var year = post_time.getFullYear();
                            var month = post_time.getMonth() + 1;
                            var day = post_time.getDate();
                            var hour = ("0"+post_time.getHours()).slice(-2);
                            var minutes = ("0" +post_time.getMinutes()).slice(-2);
                            var second = post_time.getSeconds();
                        //自分が送っているメッセージ
                            var cts ="";
                                cts =  "<div class='bms_message bms_right'>";
                                cts += "<div class='bms_message_box'>";
                                cts += "<div class='bms_message_content'>";
                                cts += "<div class='bms_message_text'>"+ results[i].message.content + "</div>";
                                cts += "</div>";
                                cts += "</div>";
                                cts += "<div class='data'>"+ month + '/' + day +'\t' + hour + ':' + minutes +"</div>";
                                cts += "</div>";
                        }else{
                            var post_time = new Date(results[i].created_at);
                            console.log(post_time);
                            var year = post_time.getFullYear();
                            var month = post_time.getMonth() + 1;
                            var day = post_time.getDate();
                            var hour = ("0"+post_time.getHours()).slice(-2);
                            var minutes = ("0" +post_time.getMinutes()).slice(-2);
                            var second = post_time.getSeconds();
                        //相手から送られてきているメッセージ
                            var img = results[i]["sender_user"]["user_detail"]["file_name"];
                            var cts ="";
                                cts =  "<div class='bms_message bms_left'>";
                                cts += "<span style='display:inline-block;'>"
                                cts += "<img id ='cmg' src='/storage/"+img+"' style='width:30px; height:30px;'>";
                                cts += "</span>";
                                cts += "  <span>"+ results[i].message.user.name + "</span>";
                                cts += "<div class='bms_message_box'>";
                                cts += "<div class='bms_message_content'>";
                                cts += "  <div class='bms_message_text'>"+ results[i].message.content + "</div>";
                                cts += "</div>";
                                cts += "</div>";
                                cts += "<div class='data'>"+ month + '/' + day +'\t' + hour + ':' + minutes +"</div>";
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
                            _token : CSRF_TOKEN,
                            id     : otheruser
                        },
                        dataType: 'json'
                        
                    }).done(function (results) {
                        for(var i in results){
                            //sender_user_idがログインユーザーIDと同じである場合
                            if(results[i].sender_user_id==loginuser){
                                //自分が送っているメッセージ
                                var post_time = new Date(results[i].created_at);
                                console.log(post_time);
                                var year = post_time.getFullYear();
                                var month = post_time.getMonth() + 1;
                                var day = post_time.getDate();
                                var hour = ("0"+post_time.getHours()).slice(-2);
                                var minutes = ("0" +post_time.getMinutes()).slice(-2);
                                var second = post_time.getSeconds();
                                
                                var cts ="";
                                cts =  "<div class='bms_message bms_right'>";
                                cts += "<div class='bms_message_box'>";
                                cts += "<div class='bms_message_content'>";
                                cts += "<div class='bms_message_text'>"+ results[i].message.content + "</div>";
                                cts += "</div>";
                                cts += "</div>";
                                cts += "<div class='data'>"+ month + '/' + day +'\t' + hour + ':' + minutes +"</div>";
                                cts += "</div>";
                            }else{
                                //相手から送られてきているメッセージ
                                var post_time = new Date(results[i].created_at);
                                console.log(post_time);
                                var year = post_time.getFullYear();
                                var month = post_time.getMonth() + 1;
                                var day = post_time.getDate();
                                var hour = ("0"+post_time.getHours()).slice(-2);
                                var minutes = ("0" +post_time.getMinutes()).slice(-2);
                                var second = post_time.getSeconds();
                                
                                var img = results[i]["sender_user"]["user_detail"]["file_name"];
                                
                                var cts ="";
                                cts =  "<div class='bms_message bms_left'>";
                                cts += "<span style='display:inline-block;'>"
                                cts += "<img id ='cmg' src='/storage/"+img+"' style='width:30px; height:30px;'>";
                                cts += "</span>";
                                cts += "<span style='padding-left:5px;'>"+ results[i].message.user.name + "</span>";
                                cts += "<div class='bms_message_box'>";
                                cts += "<div class='bms_message_content'>";
                                cts += "<div class='bms_message_text'>"+ results[i].message.content + "</div>";
                                cts += "</div>";
                                cts += "</div>";
                                cts += "<div class='data'>"+ month + '/' + day +'\t' + hour + ':' + minutes +"</div>";
                                cts += "</div>";
                            }
                            $('#bms_messages').append(cts);
                        }
		                //メッセージを送信するユーザーのIDをセット
		                //$('#postmes').val('results[0]["other_user"]["id"]');
                    }).fail(function (err) {
                        alert('データの取得に失敗しました。');
                    });
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
                        console.log(now);
                        var year = now.getFullYear();
                        var month = now.getMonth() + 1;
                        var day = now.getDate();
                        var hour = ("0"+now.getHours()).slice(-2);
                        var minutes = ("0" +now.getMinutes()).slice(-2);
                        var second = now.getSeconds();
                        
                        var plusmess = ""
                        plusmess =  "<div class='bms_message bms_right'>";
                        plusmess += "<div class='bms_message_box'>";
                        plusmess += "<div class='bms_message_content'>";
                        plusmess += "<div class='bms_message_text'>"+ content + "</div>";
                        plusmess += "</div>";
                        plusmess += "</div>";
                        plusmess += "<div class='data'>"+ month + '/' + day +'\t' + hour + ':' + minutes +"</div>";
                        plusmess += "</div>";
                        $('#bms_messages').append(plusmess);
                        $('#bms_send_message').val("");
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
