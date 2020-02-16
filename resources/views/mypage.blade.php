<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="{{secure_asset('/css/main.css') }}"type="text/css" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>
<title>バンドメンバー募集サイト</title>
</head>
<body>
    <header style="width:1250px; margin-left:auto; margin-right:auto; padding-left:0px; text-align:left; border-style:groove;">
        <div style="border-bottom-style:groove;">
        @yield('header')
        </div>
    </header>
    <main>
        <div style=" border-bottom-style:groove;">
        @yield('content')
        </div>
        <div style=>
        @yield('footer')    
        </div>
    </main>
</body>
</html>