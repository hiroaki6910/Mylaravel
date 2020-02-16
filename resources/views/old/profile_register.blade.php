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
        <div>ようこそ！</div>
        
    </header>
    <main>
        <form method="POST" action="{{ route('register') }}">
            <!--性別を選択-->
            <div style="width:1250px; margin-left:auto; margin-right:auto; padding-left:0px; text-align:center;">
                <div style="display:inline-block;">
                    <div class="">
                        <label for="gender" class=>Gender</label>
                        <div class="" style="">
                            <input id="gender-m" type="radio" name="gender" value="male">
                            <label for="gender-m">男性</label>
                            <input id="gender-f" type="radio" name="gender" value="female">
                            <label for="gender-f">女性</label>
                        </div>
                    </div>
                </div>
            <!--年齢を選択-->
            <div class="form-group row">
                <label for="age" class="">Age</label>
                <div class="col-md-6">
                    <input id="age" type="number" min="1" class="" name="age" value="{{ old('age') }}" required>
                </div>
            </div>
            
        </form>
        </div>
    </main>
</body>
</html>