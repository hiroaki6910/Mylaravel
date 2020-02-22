@extends('main')

@section('content')
    <div style="height:1000px;padding-left:0px; text-align:left;">
        <div style="padding-left:0px; text-align:left; border-bottom: 1px solid #ccc; height:50px;">
            <a href="{{url('search_member')}}" class="btn-search">検索条件<i class="fas fa-search" style="margin-left:5px;"></i></a>
        </div>
        <div>
            @if(Auth::check())
            @if(!isset($memberlist[0]))
            <div>メンバーが見つかりませんでした</div>
            @endif
            @foreach ($memberlist as $memberlist)
            @if($memberlist->id !== Auth::user()->id)
            <div style="display:inline-block; width:195px; max-width:195px; height:255px; max-height:255px; margin-top:10px; text-align:center;">
                <div style="text-align:center;">
                    @if($memberlist->user_detail->file_name == "profile.png")
                        <img src="{{ asset('image/profile.png') }}" alt="logo" style="width:90px; height:90px;">
                    @else
                        <img src="/storage/{{$memberlist->user_detail->file_name}}" alt="logo" style="width:90px; height:90px;">
                    @endif
                </div>
                <div style="text-align:center;">
                    <span><h4>{{$memberlist->name}}</h4></span>
                </div>
                <div style="text-align:center;">
                    @if($memberlist->user_detail->update_flag == "1")
                        <span>{{$memberlist->user_detail->age}}歳</span>
                        <span>
                            @if($memberlist->user_detail->gender == "1")
                                男性
                            @else
                                女性
                            @endif
                        </span>
                        <span>{{$memberlist->user_detail->address}}</span>
                    @else
                        <span>未設定</span>
                    @endif
                </div>
                <div class="balloon-top" style="text-align:center; margin-top:15px; margin-bottom:5px; padding:5px;">
                    <p style="width:155px; height:34px; word-wrap:break-word; overflow-wrap:break-word; overflow:hidden;">
                        {{$memberlist->user_detail->introduction}}
                    </p>
                </div>
                <form action="" method="post" name="my">
                    @csrf
                    @if($memberlist->user_detail->update_flag == "1")
                        <input type="button" class="btn" value="詳細" style="color: #77a8da; border: solid 1px #77a8da;">
                    @else
                        <input class="btn" value="詳細" style="width: 61px; color: #77a8da; border: solid 1px #77a8da;" disabled >
                    @endif
                        <input type="hidden" class="sendid" name="destination_id" data-target="" value="{{$memberlist->id}}">
                </form>
            </div>
            @endif
            @endforeach
            @else
            @if(!isset($memberlist[0]))
            <div>メンバーが見つかりませんでした</div>
            @endif
            @foreach ($memberlist as $memberlist)
            <div style="display:inline-block; width:195px; max-width:195px; height:255px; height:255px; max-height:255px; margin-top:10px; text-align:center;">
                <div style="text-align:center;">
                    @if($memberlist->user_detail->file_name == "profile.png")
                    <img src="{{ asset('image/profile.png') }}" alt="logo" style="width:90px; height:90px;">
                    @else
                    <img src="/storage/{{$memberlist->user_detail->file_name}}" alt="logo" style="width:90px; height:90px;">
                    @endif
                </div>
                <div style="text-align:center;">
                    <span><h4>{{$memberlist->name}}</h4></span>
                </div>
                <div style="text-align:center;">
                    @if($memberlist->user_detail->update_flag == "1")
                    <span style="">{{$memberlist->user_detail->age}}歳</span>
                    <span style="">
                        @if($memberlist->user_detail->gender == "1")
                        男性
                        @else
                        女性
                        @endif
                    </span>
                    <span style="">{{$memberlist->user_detail->address}}</span>
                    @else
                    <span>未設定</span>
                    @endif
                </div>
                <div class="balloon-top" style="text-align:center; margin-top:15px; margin-bottom:5px;">
                    <p style="width:155px; height:20px; word-wrap:break-word; overflow-wrap:break-word;height:20px; overflow:hidden;">
                        {{$memberlist->user_detail->introduction}}
                    </p>
                </div>
                <form action="" method="post" name="my">
                    @csrf
                    @if($memberlist->user_detail->update_flag == "1")
                        <input type="button" class="btn" value="詳細" style="color: #77a8da; border: solid 1px #77a8da;">
                    @else
                        <input class="btn" value="詳細" style="width:61px; color:#77a8da; border:solid 1px #77a8da;" disabled >
                    @endif
                    <input type="hidden" class="sendid" name="destination_id" data-target="" value="{{$memberlist->id}}">
                </form>
            </div>
            @endforeach
            @endif
            <!--モーダルウインドウ-->    
            <div class="modal">
                <!-- モーダルウィンドウが開いている時のオーバーレイ -->
                <div class="modal-content">
                    <!-- モーダルウィンドウの中身 -->
                    <div class="modal-body">
                        <div style="display:inline-block; width:312px;">
                            <div><h1><span id="name"></span></h1></div>
                            <div>
                                <div style="width:140px; display:inline-block; margin-bottom:5px; color:#788086;">年齢</div>
                                <div id="age" style="display:inline-block;"></div>
                            </div>
                            <div>
                                <div style="width:140px; display:inline-block; margin-bottom:5px; color:#788086;">性別</div>
                                <div id="gender" style="display:inline-block;"></div>
                            </div>
                            <div>
                                <div style="width:140px; display:inline-block; margin-bottom:5px; color:#788086;">居住地</div>
                                <div id="address" style="display:inline-block;"></div>
                            </div>
                            <div>
                                <div style="width:140px; display:inline-block; margin-bottom:5px; color:#788086;">担当パート</div>
                                <div id="part" style="display:inline-block;"></div>
                            </div>
                            <div>
                                <div style="width:140px; display:inline-block; margin-bottom:5px; color:#788086;">好きなアーティスト</div>
                                <div id="artist" style="display:inline-block;"></div>
                            </div>
                            <div>
                                <div style="width:140px; display:inline-block; margin-bottom:5px; color:#788086;">好きなジャンル</div>
                                <div id="genre" style="display:inline-block;"></div>
                            </div>
                            <div>
                                <div style="width:140px; display:inline-block; color:#788086;">URL</div>
                                <div id="url" style="margin-bottom:5px;"></div>
                            </div>
                            <div style="color:#788086;">自己紹介</div>
                                <div id="intro" style="width: 249px; height: 120px; word-wrap: break-word; overflow-wrap: break-word; overflow: hidden"></div>
                        </div>
                        <div id ="pct" style="display:inline-block; width:350px; vertical-align:top;">
                            <input type="button" class="closeBtn" value="閉じる" style="margin-left:276px; margin-top:0px; margin-bottom:16px;">
                            <img id ="cmg" src="/storage/normal" alt="logo" style="width:350px; height:350px;">
                        </div>
                        <div style="height:150px; display:inline-block; width:666px; text-align:center;">
                            <form action="" method="post">
                                @csrf
                                @if(Auth::check())
                                <input type="submit" class="btn-message" value="メッセージを送る" style="margin-top:80px;">
                                <input type="hidden" id="mordal_user_name" name="mordal_user_name">
                                <input type="hidden" id="mordal_user_id" name="mordal_user_id">
                                <input type="hidden" id="login_user_id" name="login_user_id" value="{{Auth::user()->id}}">
                                @endif
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <!--モーダルウインドウ(jQuery)-->
            <script type="text/javascript">
            
            $(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $('.btn').on('click',function(){
                   //親要素の取得（親要素をまず取得しないと、foreachでループしている値を取り出せない）
                    var $_t = $( this ).parent();
                    //取得した親要素の中のsendidクラスを取得
                    var mainType = $_t.find( '.sendid' );
                    //value値を取得
                    var send = mainType.val();
                    console.log(send);
                    $.ajax({
                        type:"POST",
                        url:"{{url('/api/main')}}",
                        data:{
                            _token: CSRF_TOKEN,
                            id    :send
                        },
                        dataType: 'json'
                        
                    }).done(function (results) {
                        //alert("success!");
                        console.log(results);
                        var gender = results[0]["user_detail"]["gender"];
                        if (gender == "1"){
                            var gender = "男性"
                        }else if(gender == "2"){
                            var gender = "女性"
                        }else{
                            var gender = "未設定"
                        }
                        //それぞれのIDに対して、取得した値を挿入する。
                        $('#name').text(results[0]["name"]);
                        $('#age').text(results[0]["user_detail"]["age"]+"歳");
                        $('#gender').text(gender);
                        $('#address').text(results[0]["user_detail"]["address"]);
                        $('#part').text(results[0]["user_detail"]["part"]);
                        $('#artist').text(results[0]["user_detail"]["artist"]);
                        $('#genre').text(results[0]["user_detail"]["genre"]);
                        $('#url').text(results[0]["user_detail"]["url"]);
                        $('#intro').text(results[0]["user_detail"]["introduction"]);
                        $('#mordal_user_id').val(results[0]["id"]);
                        $('#mordal_user_name').val(results[0]["name"]);

                        //プロフィール写真のパスを置換する処理
                        var changeL = $('#cmg').attr('src').replace('normal' , results[0]["user_detail"]["file_name"]);
		                $('#cmg').attr('src', changeL);
                        
                    }).fail(function (err) {
                        alert('データの取得に失敗しました。');
                    });
                });
            });
            $(function(){
                $('.btn').on('click',function(){
                $('.modal').fadeIn();
                return false;
                });
                $('.closeBtn').on('click',function(){
                //リロード
                location.reload();
                $('.modal').fadeOut();
                return false;
                });
            });
            </script>
        </div>
    </div>
@endsection
