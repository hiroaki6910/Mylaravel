@extends('main')
@section('header')
    <nav>
        <div class="v1" style="max-width:1250px; font-size:30px; font-family:Comic Sans MS">バンドメンバー募集サイト</div>
        <ul style="width:1250px; margin-left:auto; margin-right:auto; padding-left:0px; text-align:right;">
            @if(Auth::check())
            @csrf
            <li class="v2"><a href=>メッセージ</a></li>
            <li class="v2"><a href=>訪問者</a></li>
            <li class="v2">{{ Auth::user()->name }}</li>
            <li class="v2"><a href="{{ url('mypage') }}">マイページ</a></li>
            <li class="v2">
                <a href="{{ route('logout') }}">ログアウト</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </li>
            @else
            <li class="v2"><a href="{{ route('login') }}">ログイン</a></li>
            <li class="v2"><a href="{{ route('register') }}">会員登録</a></li>
            @endif
        </ul>
        <ul style="width:1250px; margin-left:auto; margin-right:auto; padding-left:0px; text-align:left">
            @if(Auth::check())
            <li class="v2" style=""><a href="http://localhost/Project/input.php" target="main">募集記事</a></li>
            <li class="v2" style=""><a href="http://localhost/Project/input.php" target="main">メンバー</a></li>
            <li class="v2"><a href="http://localhost/Project/input.php" target="main">投稿する</a></li> 
            @else
            <li class="v2" style=""><a href="http://localhost/Project/input.php" target="main">募集記事</a></li>
            <li class="v2" style=""><a href="http://localhost/Project/input.php" target="main">メンバー</a></li>
            @endif
        </ul>
    </nav>
@endsection

@section('content')

@endsection

@section('footer')
copyright 2019 BM search.
@endsection
