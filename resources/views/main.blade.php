<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
<link rel="stylesheet" href="{{ asset('css/modal.css') }}" />
<link rel="stylesheet" href="{{ asset('css/bmesse.css') }}" />
<link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/article.css') }}" />

<script src="{{ asset('js/app.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<title>バンドメンバー募集サイト</title>
</head>
<body style="background-color:white">
    <header class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="width:999px; height:150px; margin-left:auto; margin-right:auto; padding-left:0px; text-align:left; border: 1px solid #ccc; background-color:white">
        <nav style="">
        @if(Auth::check())
        <div style="width:1000px">
        <div style="width:1000px; font-size:40px; font-family:Comic Sans MS; text-align:center;">
            <span class="logo">■</span>
            <span class="logo2">■</span>
            <span class="maintitle" style="display:inline-block; text-align:center;">slackers</span>
        </div>
        <div style="text-align:center;">バンドメンバーが見つかるサイト</div>
        </div>
        @else
        <div style="width:990px; font-size:40px; font-family:Comic Sans MS; text-align:center; background-color:white">
            <span class="logo" style="top: 12px; left: 365px;">■</span>
            <span class="logo2" style="top: 30px; left: 380px;">■</span>
            <span class="maintitle" >slackers</span>
        </div>
        <div style="text-align:center;">バンドメンバーが見つかるサイト</div>
        <div style="text-align:right; margin-right:10px;">
            <span class="" style="margin-right:10px;">
                <a class="link" href="{{ route('login') }}">ログイン</a>
            </span>
            <span class="">
                <a class="link" href="{{ route('register') }}">会員登録</a>
            </span>
        </div>
        @endif
        </nav>
    </header>
    <main style="width:1000px; height:100%; min-height:1000px; display:table; margin-left:auto; margin-right:auto;">
        @if(Auth::check())
        <div style="display:table-cell; vertical-align:top; width:200px; height:100%; min-height:1000px; border: 1px solid #ccc; border-top-style:none; background-color:#f7f7f7;">
            <div class="" style="">
                <div class="" style="margin-left:3px;">
                    <i class="fas fa-user" style="margin-right:3px; margin-left:-1px; color:#51565a;"></i>
                    <span style="vertical-align: text-top;">{{ Auth::user()->name }}</span>
                </div>
                <div style="margin-left: 1px;"><a class="link" href="{{ url('profile') }}">マイページ</a></div>
                <div style="margin-left: 1px;">
                    <a class="link" href="{{ route('logout') }}">ログアウト</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                </div>
            </div>
            <div style="border-top: 1px solid #ccc;"><i class="fas fa-search" style="margin-right:2px; margin-left:2px; color:#51565a;"></i>探す
                <div style="margin-left: 1px;">
                    <a class="link" href="{{ url('main') }}">メンバー</a>
                </div>
                <div style="margin-left: 1px;">
                    <a class="link" href="{{ url('index_articlelist') }}">記事</a>
                </div>
            </div>
            <div style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;"><i class="fas fa-envelope" style="margin-right:2px; margin-left:2px; color:#51565a;"></i>メッセージ
                <div style="margin-left: 1px;">
                    <a class="link" href="{{ url('message') }}">メッセージ</a>
                </div>
                <!--
                <div class="" style=""><a href="{{ url('message_r') }}">メッセージ履歴(予備）</a></div>
                <div class="" style=""><a href="{{ url('message_react') }}">Reactメッセージ</a></div>
                -->
            </div>
            <!--
            <div class="" style="border: 1px solid #ccc;">訪問者
                <div class="" style=""><a href=>訪問者</a></div>
            </div>
            -->
            <!--
            <div class="" style="border: 1px solid #ccc;">いいね
                <div class="" style=""><a href=>自分から</a></div>
                <div class="" style=""><a href=>相手から</a></div>
            </div>
            -->
        </div>
        <div style="display:table-cell; width:799px; height:100%; min-height:1000px; border:1px solid #ccc; border-top-style:none; border-left-style:none;">
            @yield('content')
        </div>
        @else
        <div style="display:inline-block; width:1000px; margin-left:auto; margin-right:auto; padding-left:0px; text-align:left; border: 1px solid #ccc; border-top-style:none;">
            @yield('content')
        </div>
        @endif
    </main>
    <footer>
        <div style="width:999px; margin-left:auto; margin-right:auto; padding-left:0px; text-align:center; border: 1px solid #ccc; border-top-style:none;">
        copyright 2019 BM search.    
        </div>
    </footer>
</body>
</html>