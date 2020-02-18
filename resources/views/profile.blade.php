@extends('main')
@section('content')
    <div style="max-width:1250px; margin-left: auto; margin-right:auto;">
        <span>マイページトップ</span>
        <div style="max-width:1250px;">
            <div></div>
        </div>
    </div>
    <div style="max-width:1250px; margin-left: auto; margin-right:auto;">
        <div style="width:788px; margin-left:3px; border-bottom:1px solid #ccc;">プロフィール</div>
        <div style="width:788px; text-align:center; border-bottom: 1px solid #ccc; margin-left: 3px; margin-top:10px;">
            
                @if (isset($message))
                <div class="alert">{{$message}}</div>
                @endif
                <form action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if($profAftEdt->user_detail->file_name == null)
                        <div><img src="{{ asset('image/profile.png') }}" alt="logo"></div>
                    @else
                        <div><img src="/storage/{{$profAftEdt->user_detail->file_name}}"alt="logo" style="width:100px; height:100px;"></div>
                    @endif
                        <label for="uploadimg">
                        プロフィール画像を変更する
                        <input type="file" name="image_file" id="uploadimg">
                        </label>
                        <div style=" margin-bottom:10px;">
                        <input type="submit" value="登録" class="btn-flat-border">
                        </div>
                </form>
        </div>
        <div>
            <div class="prof">
                <span class="title">名前</span>
                <span>{{Auth::user()->name}}</span>
            </div>
            <div class="prof">
                <span class="title">メールアドレス</span>
                <span>{{Auth::user()->email}}</span>
            </div>
            <div class="prof">
                <span class="title">パスワード</span>
                <span>{{Auth::user()->password}}</span>
            </div>
            @if($profAftEdt->user_detail->update_flag == "1")
            <div class="prof">
                <span class="title">性別</span>
                @if($profAftEdt->user_detail->gender == "1")
                <span>男性</span>
                @elseif($profAftEdt->user_detail->gender == "2")
                <span>女性</span>
                @endif
            </div>
            <div class="prof">
                <span class="title">年齢</span>
                <span>{{$profAftEdt->user_detail->age}}歳</span>
            </div>
            <div class="prof">
                <span class="title">居住地</span>
                <span>{{$profAftEdt->user_detail->address}}</span>
            </div>
            <div class="prof">
                <span class="title">担当パート</span>
                <span>{{$profAftEdt->user_detail->part}}</span>
            </div>
            <div class="prof">
                <span class="title">好きなジャンル</span>
                <span>{{$profAftEdt->user_detail->genre}}</span>
            </div>
            <div class="prof">
                <span class="title">好きなアーティスト</span>
                <span>{{$profAftEdt->user_detail->artist}}</span>
            </div>
            <div class="prof">
                <span class="title">参加コミュニティ</span>
                <span>{{$profAftEdt->user_detail->community}}</span>
            </div>
            <div class="prof">
                <span class="title">URL</span>
                <span>{{$profAftEdt->user_detail->url}}</span>
            </div>
            <div class="prof" style="height:100%; min-height:77px;">
                <span class="title" style="height:100%; line-height:77px; margin-top:0px; vertical-align:top;">自己紹介</span>
                <span style="width: 500px; display:inline-block; word-wrap:break-word; overflow-wrap:break-word;">
                    {{$profAftEdt->user_detail->introduction}}
                </span>
            </div>
            <div style="text-align:center; margin-top:25px; margin-bottom:25px;">
                <a href="{{ url('profile_edt') }}" class="btn-flat-border">プロフィール編集</a>
            </div>
            @elseif($profAftEdt->user_detail->update_flag == "0")
                <div style="text-align:center;">
                    <a href="{{ url('profile_edt') }}">詳細プロフィールを登録する</a>
                </div>
            @endif
        </div>
            
        <div>
            <div style="width:788px; margin-left:3px; border-bottom:1px solid #ccc;">投稿記事</div>
            <div style="margin-left:3px;">
                @foreach ($articles as $articles)
                <div style="display:inline-block">{{$articles->title}}</div>
                <div style="display:inline-block">
                    <span>(投稿日:</span>
                    <span>{{$articles->created_at}})</span>
                </div>
                @endforeach
                @if(!isset($articles["title"]))
                <div>まだ記事はありません</div>
                @endif
            </div>
            <div style="text-align:center; margin-top:25px; margin-bottom:25px;"><a href="{{ url('article_edt') }}" class="btn-flat-border">記事を投稿する</a></div>
        </div>
    </div>
@endsection