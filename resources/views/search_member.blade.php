<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="{{ asset('/css/main.css') }}" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
<link rel="stylesheet" href="{{ asset('css/search.css') }}" />

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">
</script>
</head>
<body>
    <form action="" method="post">
        @csrf
        <div style="width:1000px; height:px; margin-left:auto; margin-right:auto; padding-left:0px; background-color:white; border: 1px solid #ccc;">
            <div style="border-bottom: 1px solid #ccc;">
               <span>メンバー検索フォーム</span>
            </div>
            <div class="title">
                <div class="title1">名前</div>
                <div class="content">
                    <input type="text" name="name" >
                </div>
            </div>
            <div class="title" style="height:100px;">
                <div class="title1" style="margin-top:40px; vertical-align:top;">都道府県</div>
                    <div class="content" style="width:836px;">
                        <input type="checkbox" name="add[]" value="北海道">北海道
                        <input type="checkbox" name="add[]" value="青森県">青森県
                        <input type="checkbox" name="add[]" value="岩手県">岩手県
                        <input type="checkbox" name="add[]" value="宮城県">宮城県
                        <input type="checkbox" name="add[]" value="秋田県">秋田県
                        <input type="checkbox" name="add[]" value="山形県">山形県
                        <input type="checkbox" name="add[]" value="福島県">福島県
                        <input type="checkbox" name="add[]" value="茨城県">茨城県
                        <input type="checkbox" name="add[]" value="栃木県">栃木県
                        <input type="checkbox" name="add[]" value="群馬県">群馬県
                        <input type="checkbox" name="add[]" value="埼玉県">埼玉県
                        <input type="checkbox" name="add[]" value="千葉県">千葉県
                        <input type="checkbox" name="add[]" value="東京都">東京都
                        <input type="checkbox" name="add[]" value="神奈川県">神奈川県
                        <input type="checkbox" name="add[]" value="新潟県">新潟県
                        <input type="checkbox" name="add[]" value="富山県">富山県
                        <input type="checkbox" name="add[]" value="石川県">石川県
                        <input type="checkbox" name="add[]" value="福井県">福井県
                        <input type="checkbox" name="add[]" value="山梨県">山梨県
                        <input type="checkbox" name="add[]" value="長野県">長野県
                        <input type="checkbox" name="add[]" value="岐阜県">岐阜県
                        <input type="checkbox" name="add[]" value="静岡県">静岡県
                        <input type="checkbox" name="add[]" value="愛知県">愛知県
                        <input type="checkbox" name="add[]" value="三重県">三重県
                        <input type="checkbox" name="add[]" value="滋賀県">滋賀県
                        <input type="checkbox" name="add[]" value="京都府">京都府
                        <input type="checkbox" name="add[]" value="大阪府">大阪府
                        <input type="checkbox" name="add[]" value="兵庫県">兵庫県
                        <input type="checkbox" name="add[]" value="奈良県">奈良県
                        <input type="checkbox" name="add[]" value="和歌山県">和歌山県
                        <input type="checkbox" name="add[]" value="鳥取県">鳥取県
                        <input type="checkbox" name="add[]" value="島根県">島根県
                        <input type="checkbox" name="add[]" value="岡山県">岡山県
                        <input type="checkbox" name="add[]" value="広島県">広島県
                        <input type="checkbox" name="add[]" value="山口県">山口県
                        <input type="checkbox" name="add[]" value="徳島県">徳島県
                        <input type="checkbox" name="add[]" value="愛媛県">愛媛県
                        <input type="checkbox" name="add[]" value="高知県">高知県
                        <input type="checkbox" name="add[]" value="福岡県">福岡県
                        <input type="checkbox" name="add[]" value="佐賀県">佐賀県
                        <input type="checkbox" name="add[]" value="長崎県">長崎県
                        <input type="checkbox" name="add[]" value="熊本県">熊本県
                        <input type="checkbox" name="add[]" value="大分県">大分県
                        <input type="checkbox" name="add[]" value="宮崎県">宮崎県
                        <input type="checkbox" name="add[]" value="鹿児島県">鹿児島県
                        <input type="checkbox" name="add[]" value="沖縄県">沖縄県
                    </div>
            </div>
            <div class="title">      
                <div class="title1">担当パート</div>
                <div class="content">
                    <input type="checkbox" name="part[]" value="ボーカル">ボーカル
                    <input type="checkbox" name="part[]" value="ギター">ギター
                    <input type="checkbox" name="part[]" value="ベース">ベース
                    <input type="checkbox" name="part[]" value="ドラム">ドラム
                    <input type="checkbox" name="part[]" value="キーボード">キーボード
                    <input type="checkbox" name="part[]" value="その他">その他
                </div>
            </div>
            <div class="title">      
                <div class="title1" style="vertical-align:top;">好きなジャンル</div>
                <div class="content" style="width:700px; margin-top: 14px;">
                    <input type="checkbox" name="genre[]" value="ロック">ロック
                    <input type="checkbox" name="genre[]" value="ハードロック">ハードロック
                    <input type="checkbox" name="genre[]" value="メタル">メタル
                    <input type="checkbox" name="genre[]" value="ハードコア">ハードコア
                    <input type="checkbox" name="genre[]" value="ファンク">ファンク
                    <input type="checkbox" name="genre[]" value="ソウル/R&B">ソウル/R&B
                    <input type="checkbox" name="genre[]" value="ジャズ">ジャズ
                    <input type="checkbox" name="genre[]" value="プログレ">プログレ
                    <input type="checkbox" name="genre[]" value="マスロック">マスロック
                    <input type="checkbox" name="genre[]" value="ポストロック">ポストロック
                    <input type="checkbox" name="genre[]" value="アンビエント ">アンビエント 
                    <input type="checkbox" name="genre[]" value="エレクトロニカ">エレクトロニカ
                    <input type="checkbox" name="genre[]" value="ハウス/テクノ">ハウス/テクノ
                    <input type="checkbox" name="genre[]" value="ヒップホップ">ヒップホップ
                    <input type="checkbox" name="genre[]" value="ノイズ">ノイズ
                    <input type="checkbox" name="genre[]" value="アニソン/ボカロ">アニソン/ボカロ
                </div>
            </div>
            <div class="title">      
                <div class="title1">性別</div>
                <div class="content">
                    <select name="gender">
                        <option value="" selected>指定なし</option>
                        <option value="1">男</option>
                        <option value="2">女</option>
                    </select>
                </div>
            </div>
            <div class="title">      
                <div class="title1">年齢</div>
                <div class="content">
                    <input type="number" name="agemin" value="{{ old('agemin') }}">
                    〜
                    <input type="number" name="agemax" value="{{ old('agemax') }}">
                </div>
            </div>
            <div class="title">      
                <div class="title1">好きなアーティスト</div>
                <div class="content">
                    <input type="text" name="artist" style="width:330px;">
                </div>
            </div>
            <div style="text-align:center;">
                <input class="btn-search" type="reset" value="入力内容をクリア">
                <input class="btn-search" type="submit" value="検索">
            </div>
        </div>
    </form>
</body>