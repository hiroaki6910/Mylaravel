@extends('main')
@section('content')
    <div style="max-width:1000px; margin-left: auto; margin-right:auto;">
        <span>マイページトップ</span>
        <div style="max-width:1000px;">
            <div></div>
        </div>
    </div>
        <div style="max-width:1000px; margin-left:auto; margin-right:auto;">
            <div style="width:788px; margin-left:3px; border-bottom:1px solid #ccc;">記事の投稿</div>
                <form action="" method="post">
                    @csrf
                    <div class="prof">
                        <span class="title">記事のタイトル</span>
                        <input type="text" name="title">
                    </div>
                    <div class="prof" style="height: 117px;">
                        <div class="title" style="vertical-align:top; margin-top:50px;">都道府県</div>
                        <div style="display:inline-block; width:600px;">
                        <input type="checkbox" name="area[]" value="北海道">北海道
                        <input type="checkbox" name="area[]" value="青森県">青森県
                        <input type="checkbox" name="area[]" value="岩手県">岩手県
                        <input type="checkbox" name="area[]" value="宮城県">宮城県
                        <input type="checkbox" name="area[]" value="秋田県">秋田県
                        <input type="checkbox" name="area[]" value="山形県">山形県
                        <input type="checkbox" name="area[]" value="福島県">福島県
                        <input type="checkbox" name="area[]" value="茨城県">茨城県
                        <input type="checkbox" name="area[]" value="栃木県">栃木県
                        <input type="checkbox" name="area[]" value="群馬県">群馬県
                        <input type="checkbox" name="area[]" value="埼玉県">埼玉県
                        <input type="checkbox" name="area[]" value="千葉県">千葉県
                        <input type="checkbox" name="area[]" value="東京都">東京都
                        <input type="checkbox" name="area[]" value="神奈川県">神奈川県
                        <input type="checkbox" name="area[]" value="新潟県">新潟県
                        <input type="checkbox" name="area[]" value="富山県">富山県
                        <input type="checkbox" name="area[]" value="石川県">石川県
                        <input type="checkbox" name="area[]" value="福井県">福井県
                        <input type="checkbox" name="area[]" value="山梨県">山梨県
                        <input type="checkbox" name="area[]" value="長野県">長野県
                        <input type="checkbox" name="area[]" value="岐阜県">岐阜県
                        <input type="checkbox" name="area[]" value="静岡県">静岡県
                        <input type="checkbox" name="area[]" value="愛知県">愛知県
                        <input type="checkbox" name="area[]" value="三重県">三重県
                        <input type="checkbox" name="area[]" value="滋賀県">滋賀県
                        <input type="checkbox" name="area[]" value="京都府">京都府
                        <input type="checkbox" name="area[]" value="大阪府">大阪府
                        <input type="checkbox" name="area[]" value="兵庫県">兵庫県
                        <input type="checkbox" name="area[]" value="奈良県">奈良県
                        <input type="checkbox" name="area[]" value="和歌山県">和歌山県
                        <input type="checkbox" name="area[]" value="鳥取県">鳥取県
                        <input type="checkbox" name="area[]" value="島根県">島根県
                        <input type="checkbox" name="area[]" value="岡山県">岡山県
                        <input type="checkbox" name="area[]" value="広島県">広島県
                        <input type="checkbox" name="area[]" value="山口県">山口県
                        <input type="checkbox" name="area[]" value="徳島県">徳島県
                        <input type="checkbox" name="area[]" value="香川県">香川県
                        <input type="checkbox" name="area[]" value="愛媛県">愛媛県
                        <input type="checkbox" name="area[]" value="高知県">高知県
                        <input type="checkbox" name="area[]" value="福岡県">福岡県
                        <input type="checkbox" name="area[]" value="佐賀県">佐賀県
                        <input type="checkbox" name="area[]" value="長崎県">長崎県
                        <input type="checkbox" name="area[]" value="熊本県">熊本県
                        <input type="checkbox" name="area[]" value="大分県">大分県
                        <input type="checkbox" name="area[]" value="宮崎県">宮崎県
                        <input type="checkbox" name="area[]" value="鹿児島県">鹿児島県
                        <input type="checkbox" name="area[]" value="沖縄県">沖縄県
                        </div>
                    </div> 
                    <div class="prof">
                        <span class="title">活動する曜日</span>    
                        <select name="day">
                            <option value="" selected>未選択</option>
                            <option value="指定なし">指定なし</option>
                            <option value="平日">平日</option>
                            <option value="土日">土日</option>
                            <option value="土曜">土曜</option>
                            <option value="日曜">日曜</option>
                        </select>
                    </div>
                    <div class="prof">
                        <span class="title">バンドの方向性</span>
                        <select name="direction">
                            <option value="" selected>未選択</option>
                            <option value="指定なし">指定なし</option>
                            <option value="プロ志向">プロ志向</option>
                            <option value="インディーズ">インディーズ</option>
                            <option value="趣味">趣味</option>
                        </select>   
                    </div>
                    <div class="prof">
                        <span class="title">募集する年齢</span>
                        <select name="articleage">
                            <option value="" selected>未選択</option>
                            <option value="指定なし">指定なし</option>
                            <option value="10代">10代</option>
                            <option value="20代">20代</option>
                            <option value="30代">30代</option>
                            <option value="40代">40代</option>
                            <option value="50代">50代</option>
                            <option value="60代">60代</option>
                        </select>   
                    </div>
                    <div class="prof">
                        <span class="title">募集パート</span>
                        <input type="checkbox" name="part[]" value="ボーカル">ボーカル
                        <input type="checkbox" name="part[]" value="ギター">ギター
                        <input type="checkbox" name="part[]" value="ベース">ベース
                        <input type="checkbox" name="part[]" value="ドラム">ドラム
                        <input type="checkbox" name="part[]" value="キーボード">キーボード
                        <input type="checkbox" name="part[]" value="その他">その他
                    </div>
                    <div class="prof" style="height:70px;">
                        <div class="title" style="vertical-align:top; margin-top:25px;">ジャンル</div>
                        <div style="display:inline-block; width:612px;">
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
                    <div class="prof">
                        <span class="title">バンドの楽曲</span>
                        <select name="song">
                            <option value="" selected>未選択</option>
                            <option value="指定なし">指定なし</option>
                            <option value="オリジナル">オリジナル</option>
                            <option value="コピー">コピー</option>
                            <option value="オリジナル、コピー両方">オリジナル、コピー両方</option>
                        </select>   
                    </div>
                    <div class="prof">
                        <span class="title">デモ音源</span>
                        <input type="url" name="demo"> 
                    </div>
                    <div class="prof" style="height:140px;">
                        <div class="title" style="vertical-align:top; margin-top:60px;">募集内容</div>
                        <textarea name="content" rows="5" cols="60" style="margin-top:9px;">募集内容の詳細を書いてください</textarea>
                    </div>                                            
                    <!-- ログインしているユーザーのidをhiddenで送る-->
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <input type="hidden" name="detail_id" value="{{$userdetail_id['0']->id}}">
                    <div style="text-align:center;">
                        <input type="reset" value="キャンセル">
                        <input type="submit" value="登録">
                    </div>
                </form>
        </div>
@endsection

@section('footer')
    <div style="width:1000px; height:px; margin-left:auto; margin-right:auto; padding-left:0px; text-align:left; display:flex;justify-content:center; align-items:center; border-style:groove;">
        copyright 2019 BM search.
    </<div>
@endsection