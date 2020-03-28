@extends('main')
@section('content')
    <div style="max-width:1000px; margin-left: auto; margin-right:auto;">
        <span><a class="link" href="{{ url('profile') }}">マイページトップ</a></span>
        <div style="max-width:1000px;">
            <div></div>
        </div>
    </div>
        <div style="max-width:1000px; margin-left:auto; margin-right:auto;">
            <div style="display:inline-block; width:788px; margin-left:3px; border-bottom:1px solid #ccc;">記事の投稿</div>
                <form action="" method="post">
                    @csrf
                    <div class="prof">
                        <span class="title">記事のタイトル</span>
                        <input type="text" name="title" id="title" style="width:300px;">
                    </div>
                    <div class="prof" style="height: 117px;">
                        <div class="title" style="vertical-align:top; margin-top:50px;">都道府県</div>
                        <div style="display:inline-block; width:600px;">
                        <input type="checkbox" name="area[]" value="北海道" @if(is_array($area) && in_array("北海道", $area, true)) checked @endif>北海道
                        <input type="checkbox" name="area[]" value="青森県" @if(is_array($area) && in_array("青森県", $area, true)) checked @endif>青森県
                        <input type="checkbox" name="area[]" value="岩手県" @if(is_array($area) && in_array("岩手県", $area, true)) checked @endif>岩手県
                        <input type="checkbox" name="area[]" value="宮城県" @if(is_array($area) && in_array("宮城県", $area, true)) checked @endif>宮城県
                        <input type="checkbox" name="area[]" value="秋田県" @if(is_array($area) && in_array("秋田県", $area, true)) checked @endif>秋田県
                        <input type="checkbox" name="area[]" value="山形県" @if(is_array($area) && in_array("山形県", $area, true)) checked @endif>山形県
                        <input type="checkbox" name="area[]" value="福島県" @if(is_array($area) && in_array("福島県", $area, true)) checked @endif>福島県
                        <input type="checkbox" name="area[]" value="茨城県" @if(is_array($area) && in_array("茨城県", $area, true)) checked @endif>茨城県
                        <input type="checkbox" name="area[]" value="栃木県" @if(is_array($area) && in_array("栃木県", $area, true)) checked @endif>栃木県
                        <input type="checkbox" name="area[]" value="群馬県" @if(is_array($area) && in_array("群馬県", $area, true)) checked @endif>群馬県
                        <input type="checkbox" name="area[]" value="埼玉県" @if(is_array($area) && in_array("埼玉県", $area, true)) checked @endif>埼玉県
                        <input type="checkbox" name="area[]" value="千葉県" @if(is_array($area) && in_array("千葉県", $area, true)) checked @endif>千葉県
                        <input type="checkbox" name="area[]" value="東京都" @if(is_array($area) && in_array("東京都", $area, true)) checked @endif>東京都
                        <input type="checkbox" name="area[]" value="神奈川県" @if(is_array($area) && in_array("神奈川県", $area, true)) checked @endif>神奈川県
                        <input type="checkbox" name="area[]" value="新潟県" @if(is_array($area) && in_array("新潟県", $area, true)) checked @endif>新潟県
                        <input type="checkbox" name="area[]" value="富山県" @if(is_array($area) && in_array("富山県", $area, true)) checked @endif>富山県
                        <input type="checkbox" name="area[]" value="石川県" @if(is_array($area) && in_array("石川県", $area, true)) checked @endif>石川県
                        <input type="checkbox" name="area[]" value="福井県" @if(is_array($area) && in_array("福井県", $area, true)) checked @endif>福井県
                        <input type="checkbox" name="area[]" value="山梨県" @if(is_array($area) && in_array("山梨県", $area, true)) checked @endif>山梨県
                        <input type="checkbox" name="area[]" value="長野県" @if(is_array($area) && in_array("長野県", $area, true)) checked @endif>長野県
                        <input type="checkbox" name="area[]" value="岐阜県" @if(is_array($area) && in_array("岐阜県", $area, true)) checked @endif>岐阜県
                        <input type="checkbox" name="area[]" value="静岡県" @if(is_array($area) && in_array("静岡県", $area, true)) checked @endif>静岡県
                        <input type="checkbox" name="area[]" value="愛知県" @if(is_array($area) && in_array("愛知県", $area, true)) checked @endif>愛知県
                        <input type="checkbox" name="area[]" value="三重県" @if(is_array($area) && in_array("三重県", $area, true)) checked @endif>三重県
                        <input type="checkbox" name="area[]" value="滋賀県" @if(is_array($area) && in_array("滋賀県", $area, true)) checked @endif>滋賀県
                        <input type="checkbox" name="area[]" value="京都府" @if(is_array($area) && in_array("京都府", $area, true)) checked @endif>京都府
                        <input type="checkbox" name="area[]" value="大阪府" @if(is_array($area) && in_array("大阪府", $area, true)) checked @endif>大阪府
                        <input type="checkbox" name="area[]" value="兵庫県" @if(is_array($area) && in_array("兵庫県", $area, true)) checked @endif>兵庫県
                        <input type="checkbox" name="area[]" value="奈良県" @if(is_array($area) && in_array("奈良県", $area, true)) checked @endif>奈良県
                        <input type="checkbox" name="area[]" value="和歌山県" @if(is_array($area) && in_array("和歌山県", $area, true)) checked @endif>和歌山県
                        <input type="checkbox" name="area[]" value="鳥取県" @if(is_array($area) && in_array("鳥取県", $area, true)) checked @endif>鳥取県
                        <input type="checkbox" name="area[]" value="島根県" @if(is_array($area) && in_array("島根県", $area, true)) checked @endif>島根県
                        <input type="checkbox" name="area[]" value="岡山県" @if(is_array($area) && in_array("岡山県", $area, true)) checked @endif>岡山県
                        <input type="checkbox" name="area[]" value="広島県" @if(is_array($area) && in_array("広島県", $area, true)) checked @endif>広島県
                        <input type="checkbox" name="area[]" value="山口県" @if(is_array($area) && in_array("山口県", $area, true)) checked @endif>山口県
                        <input type="checkbox" name="area[]" value="徳島県" @if(is_array($area) && in_array("徳島県", $area, true)) checked @endif>徳島県
                        <input type="checkbox" name="area[]" value="香川県" @if(is_array($area) && in_array("香川県", $area, true)) checked @endif>香川県
                        <input type="checkbox" name="area[]" value="愛媛県" @if(is_array($area) && in_array("愛媛県", $area, true)) checked @endif>愛媛県
                        <input type="checkbox" name="area[]" value="高知県" @if(is_array($area) && in_array("高知県", $area, true)) checked @endif>高知県
                        <input type="checkbox" name="area[]" value="福岡県" @if(is_array($area) && in_array("福岡県", $area, true)) checked @endif>福岡県
                        <input type="checkbox" name="area[]" value="佐賀県" @if(is_array($area) && in_array("佐賀県", $area, true)) checked @endif>佐賀県
                        <input type="checkbox" name="area[]" value="長崎県" @if(is_array($area) && in_array("長崎県", $area, true)) checked @endif>長崎県
                        <input type="checkbox" name="area[]" value="熊本県" @if(is_array($area) && in_array("熊本県", $area, true)) checked @endif>熊本県
                        <input type="checkbox" name="area[]" value="大分県" @if(is_array($area) && in_array("大分県", $area, true)) checked @endif>大分県
                        <input type="checkbox" name="area[]" value="宮崎県" @if(is_array($area) && in_array("宮崎県", $area, true)) checked @endif>宮崎県
                        <input type="checkbox" name="area[]" value="鹿児島県" @if(is_array($area) && in_array("鹿児島県", $area, true)) checked @endif>鹿児島県
                        <input type="checkbox" name="area[]" value="沖縄県" @if(is_array($area) && in_array("沖縄県", $area, true)) checked @endif>沖縄県
                        </div>
                    </div> 
                    <div class="prof">
                        <span class="title">活動する曜日</span>    
                        <select name="day">
                            <option value="" selected>未選択</option>
                            <option value="指定なし" @if($articleinfo['0']['day'] =='指定なし') selected  @endif>指定なし</option>
                            <option value="平日" @if($articleinfo['0']['day'] =='平日') selected  @endif>平日</option>
                            <option value="土日" @if($articleinfo['0']['day'] =='土日') selected  @endif>土日</option>
                            <option value="土曜" @if($articleinfo['0']['day'] =='土曜') selected  @endif>土曜</option>
                            <option value="日曜" @if($articleinfo['0']['day'] =='日曜') selected  @endif>日曜</option>
                        </select>
                    </div>
                    <div class="prof">
                        <span class="title">バンドの方向性</span>
                        <select name="direction">
                            <option value="" selected>未選択</option>
                            <option value="指定なし" @if($articleinfo['0']['direction'] =='指定なし') selected  @endif>指定なし</option>
                            <option value="プロ志向" @if($articleinfo['0']['direction'] =='プロ志向') selected  @endif>プロ志向</option>
                            <option value="インディーズ" @if($articleinfo['0']['direction'] =='インディーズ') selected  @endif>インディーズ</option>
                            <option value="趣味" @if($articleinfo['0']['direction'] =='趣味') selected  @endif>趣味</option>
                        </select>   
                    </div>
                    <div class="prof">
                        <span class="title">募集する年齢</span>
                        <select name="articleage">
                            <option value="" selected>未選択</option>
                            <option value="指定なし" @if($articleinfo['0']['articleage'] =='指定なし') selected  @endif>指定なし</option>
                            <option value="10代" @if($articleinfo['0']['articleage'] =='10代') selected  @endif>10代</option>
                            <option value="20代" @if($articleinfo['0']['articleage'] =='20代') selected  @endif>20代</option>
                            <option value="30代" @if($articleinfo['0']['articleage'] =='30代') selected  @endif>30代</option>
                            <option value="40代" @if($articleinfo['0']['articleage'] =='40代') selected  @endif>40代</option>
                            <option value="50代" @if($articleinfo['0']['articleage'] =='50代') selected  @endif>50代</option>
                            <option value="60代" @if($articleinfo['0']['articleage'] =='60代') selected  @endif>60代</option>
                        </select>   
                    </div>
                    <div class="prof">
                        <span class="title">募集パート</span>
                        <input type="checkbox" name="part[]" value="ボーカル" @if(is_array($part) && in_array("ボーカル", $part, true)) checked @endif>ボーカル
                        <input type="checkbox" name="part[]" value="ギター" @if(is_array($part) && in_array("ギター", $part, true)) checked @endif>ギター
                        <input type="checkbox" name="part[]" value="ベース" @if(is_array($part) && in_array("ベース", $part, true)) checked @endif>ベース
                        <input type="checkbox" name="part[]" value="ドラム" @if(is_array($part) && in_array("ドラム", $part, true)) checked @endif>ドラム
                        <input type="checkbox" name="part[]" value="キーボード" @if(is_array($part) && in_array("キーボード", $part, true)) checked @endif>キーボード
                        <input type="checkbox" name="part[]" value="その他" @if(is_array($part) && in_array("その他", $part, true)) checked @endif>その他
                    </div>
                    <div class="prof" style="height:70px;">
                        <div class="title" style="vertical-align:top; margin-top:25px;">ジャンル</div>
                        <div style="display:inline-block; width:612px;">
                        <input type="checkbox" name="genre[]" value="ロック" @if(is_array($genre) && in_array("ロック", $genre, true)) checked @endif>ロック
                        <input type="checkbox" name="genre[]" value="ハードロック" @if(is_array($genre) && in_array("ハードロック", $genre, true)) checked @endif>ハードロック
                        <input type="checkbox" name="genre[]" value="メタル" @if(is_array($genre) && in_array("メタル", $genre, true)) checked @endif>メタル
                        <input type="checkbox" name="genre[]" value="ハードコア" @if(is_array($genre) && in_array("ハードコア", $genre, true)) checked @endif>ハードコア
                        <input type="checkbox" name="genre[]" value="ファンク" @if(is_array($genre) && in_array("ファンク", $genre, true)) checked @endif>ファンク
                        <input type="checkbox" name="genre[]" value="ソウル/R&B" @if(is_array($genre) && in_array("ソウル/R&B", $genre, true)) checked @endif>ソウル/R&B
                        <input type="checkbox" name="genre[]" value="ジャズ" @if(is_array($genre) && in_array("ジャズ", $genre, true)) checked @endif>ジャズ
                        <input type="checkbox" name="genre[]" value="プログレ" @if(is_array($genre) && in_array("プログレ", $genre, true)) checked @endif>プログレ
                        <input type="checkbox" name="genre[]" value="マスロック" @if(is_array($genre) && in_array("マスロック", $genre, true)) checked @endif>マスロック
                        <input type="checkbox" name="genre[]" value="ポストロック" @if(is_array($genre) && in_array("ポストロック", $genre, true)) checked @endif>ポストロック
                        <input type="checkbox" name="genre[]" value="アンビエント " @if(is_array($genre) && in_array("アンビエント", $genre, true)) checked @endif>アンビエント 
                        <input type="checkbox" name="genre[]" value="エレクトロニカ" @if(is_array($genre) && in_array("エレクトロニカ", $genre, true)) checked @endif>エレクトロニカ
                        <input type="checkbox" name="genre[]" value="ハウス/テクノ" @if(is_array($genre) && in_array("ハウス/テクノ", $genre, true)) checked @endif>ハウス/テクノ
                        <input type="checkbox" name="genre[]" value="ヒップホップ" @if(is_array($genre) && in_array("ヒップホップ", $genre, true)) checked @endif>ヒップホップ
                        <input type="checkbox" name="genre[]" value="ノイズ" @if(is_array($genre) && in_array("ノイズ", $genre, true)) checked @endif>ノイズ
                        <input type="checkbox" name="genre[]" value="アニソン/ボカロ" @if(is_array($genre) && in_array("アニソン/ボカロ", $genre, true)) checked @endif>アニソン/ボカロ
                        </div>
                    </div>
                    <div class="prof">
                        <span class="title">バンドの楽曲</span>
                        <select name="song">
                            <option value="" selected>未選択</option>
                            <option value="指定なし" @if($articleinfo['0']['song'] =='指定なし') selected  @endif>指定なし</option>
                            <option value="オリジナル" @if($articleinfo['0']['song'] =='オリジナル') selected  @endif>オリジナル</option>
                            <option value="コピー" @if($articleinfo['0']['song'] =='コピー') selected  @endif>コピー</option>
                            <option value="オリジナル、コピー両方" @if($articleinfo['0']['song'] =='オリジナル、コピー両方') selected  @endif>オリジナル、コピー両方</option>
                        </select>   
                    </div>
                    <div class="prof">
                        <span class="title">デモ音源</span>
                        <input type="url" id="demo" name="demo"> 
                    </div>
                    <div class="prof" style="height:140px;">
                        <div class="title" style="vertical-align:top; margin-top:60px;">募集内容</div>
                        <textarea name="content" id ="content" rows="5" cols="60" style="margin-top:9px;">募集内容の詳細を書いてください</textarea>
                    </div>                                            
                    <!-- ログインしているユーザーのidをhiddenで送る-->
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <input type="hidden" name="detail_id" value="{{$userdetail['0']->id}}">
                    <input type="hidden" name="article_id" value="{{$value}}">
                    <div style="text-align:center; margin-top:25px;">
                        <input class="btn-flat-border" type="reset" value="入力内容をクリア">
                        <input class="btn-flat-border" type="submit" value="登録">
                    </div>
                </form>
            <script type="text/javascript">
            //データベースに入っている値をチェックボックスへ反映するための処理(作成中）
            $(function(){
                if('$articleinfo'){
                    //テキストボックスへ値を設定
                    $("#title").val("{{$articleinfo['0']['title']}}");
                    $("#demo").val("{{$articleinfo['0']['demo']}}");
                    $("#content").val("{{$articleinfo['0']['content']}}");
                }
            });
            </script>
        </div>
@endsection