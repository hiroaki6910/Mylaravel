@extends('main')
    
@section('content')
    <div style="max-width:1250px; margin-left: auto; margin-right:auto;">
        <span><a class="link" href="{{ url('profile') }}">マイページトップ</a></span>
        <div style="max-width:1250px;">
            <div></div>
        </div>
    </div>
    <div style="max-width:1000px; margin-left: auto; margin-right:auto;">
        <div style="width:788px; margin-left:3px; border-bottom:1px solid #ccc;">プロフィール修正</div>
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
                    
            <form action="" method="post">
                @csrf
                <div class="prof">
                    <span class="title">性別</span>
                    <input type="radio" name="sex" value="1" {{$uspro->user_detail->gender == "1" ? 'checked': null }}>男
                    <input type="radio" name="sex" value="2" {{$uspro->user_detail->gender == "2" ? 'checked': null }}>女
                </div>
                <div class="prof">
                    <span class="title">年齢</span>
                    <input type="number" name="age" value="{{ old('user_detail->age') ?? $uspro->user_detail->age}}">歳
                </div>
                <div class="prof">
                    <span class="title">都道府県</span>
                    <select name="add">
                        @if("{{$uspro->user_detail->address}}")
                        <option value="{{ old('user_detail->address') ?? $uspro->user_detail->address}}">{{ old('user_detail->address') ?? $uspro->user_detail->address}}</option>
                        else
                        <option value="">未選択</option>
                        @endif
                        <option value="北海道">北海道</option>
                        <option value="青森県">青森県</option>
                        <option value="岩手県">岩手県</option>
                        <option value="宮城県">宮城県</option>
                        <option value="秋田県">秋田県</option>
                        <option value="山形県">山形県</option>
                        <option value="福島県">福島県</option>
                        <option value="茨城県">茨城県</option>
                        <option value="栃木県">栃木県</option>
                        <option value="群馬県">群馬県</option>
                        <option value="埼玉県">埼玉県</option>
                        <option value="千葉県">千葉県</option>
                        <option value="東京都">東京都</option>
                        <option value="神奈川県">神奈川県</option>
                        <option value="新潟県">新潟県</option>
                        <option value="富山県">富山県</option>
                        <option value="石川県">石川県</option>
                        <option value="福井県">福井県</option>
                        <option value="山梨県">山梨県</option>
                        <option value="長野県">長野県</option>
                        <option value="岐阜県">岐阜県</option>
                        <option value="静岡県">静岡県</option>
                        <option value="愛知県">愛知県</option>
                        <option value="三重県">三重県</option>
                        <option value="滋賀県">滋賀県</option>
                        <option value="京都府">京都府</option>
                        <option value="大阪府">大阪府</option>
                        <option value="兵庫県">兵庫県</option>
                        <option value="奈良県">奈良県</option>
                        <option value="和歌山県">和歌山県</option>
                        <option value="鳥取県">鳥取県</option>
                        <option value="島根県">島根県</option>
                        <option value="岡山県">岡山県</option>
                        <option value="広島県">広島県</option>
                        <option value="山口県">山口県</option>
                        <option value="徳島県">徳島県</option>
                        <option value="香川県">香川県</option>
                        <option value="愛媛県">愛媛県</option>
                        <option value="高知県">高知県</option>
                        <option value="福岡県">福岡県</option>
                        <option value="佐賀県">佐賀県</option>
                        <option value="長崎県">長崎県</option>
                        <option value="熊本県">熊本県</option>
                        <option value="大分県">大分県</option>
                        <option value="宮崎県">宮崎県</option>
                        <option value="鹿児島県">鹿児島県</option>
                        <option value="沖縄県">沖縄県</option>
                    </select>
                </div>
                <div class="prof">
                    <span class="title">担当パート</span>
                    <input type="checkbox" name="part[]" class="part" value="ボーカル" @if(is_array($us_part) && in_array("ボーカル", $us_part, true)) checked @endif>ボーカル
                    <input type="checkbox" name="part[]" class="part" value="ギター" @if(is_array($us_part) && in_array("ギター", $us_part, true)) checked @endif>ギター
                    <input type="checkbox" name="part[]" class="part" value="ベース"　@if(is_array($us_part) && in_array("ベース", $us_part, true)) checked @endif>ベース
                    <input type="checkbox" name="part[]" class="part" value="ドラム"　@if(is_array($us_part) && in_array("ドラム", $us_part, true)) checked @endif>ドラム
                    <input type="checkbox" name="part[]" class="part" value="キーボード"　@if(is_array($us_part) && in_array("キーボード", $us_part, true)) checked @endif>キーボード
                    <input type="checkbox" name="part[]" class="part" value="その他"　@if(is_array($us_part) && in_array("その他", $us_part, true)) checked @endif>その他
                </div>
                <div class="prof" style="height:70px;">
                    <div class="title" style="vertical-align:top; margin-top:25px;">ジャンル</div>
                    <div style="display:inline-block; width:612px;">
                    <input type="checkbox" name="genre[]" value="ロック" @if(is_array($us_genre) && in_array("ロック", $us_genre, true)) checked @endif>ロック
                    <input type="checkbox" name="genre[]" value="ハードロック" @if(is_array($us_genre) && in_array("ハードロック", $us_genre, true)) checked @endif>ハードロック
                    <input type="checkbox" name="genre[]" value="メタル" @if(is_array($us_genre) && in_array("メタル", $us_genre, true)) checked @endif>メタル
                    <input type="checkbox" name="genre[]" value="ハードコア" @if(is_array($us_genre) && in_array("ハードコア", $us_genre, true)) checked @endif>ハードコア
                    <input type="checkbox" name="genre[]" value="ファンク" @if(is_array($us_genre) && in_array("ファンク", $us_genre, true)) checked @endif>ファンク
                    <input type="checkbox" name="genre[]" value="ソウル/R&B" @if(is_array($us_genre) && in_array("ソウル/R&B", $us_genre, true)) checked @endif>ソウル/R&B
                    <input type="checkbox" name="genre[]" value="ジャズ" @if(is_array($us_genre) && in_array("ジャズ", $us_genre, true)) checked @endif >ジャズ
                    <input type="checkbox" name="genre[]" value="プログレ" @if(is_array($us_genre) && in_array("プログレ", $us_genre, true)) checked @endif >プログレ
                    <input type="checkbox" name="genre[]" value="マスロック" @if(is_array($us_genre) && in_array("マスロック", $us_genre, true)) checked @endif >マスロック
                    <input type="checkbox" name="genre[]" value="ポストロック" @if(is_array($us_genre) && in_array("ポストロック", $us_genre, true)) checked @endif>ポストロック
                    <input type="checkbox" name="genre[]" value="アンビエント" @if(is_array($us_genre) && in_array("アンビエント", $us_genre, true)) checked @endif>アンビエント 
                    <input type="checkbox" name="genre[]" value="エレクトロニカ" @if(is_array($us_genre) && in_array("エレクトロニカ", $us_genre, true)) checked @endif>エレクトロニカ
                    <input type="checkbox" name="genre[]" value="ハウス/テクノ" @if(is_array($us_genre) && in_array("ハウス/テクノ", $us_genre, true)) checked @endif>ハウス/テクノ
                    <input type="checkbox" name="genre[]" value="ヒップホップ" @if(is_array($us_genre) && in_array("ヒップホップ", $us_genre, true)) checked @endif>ヒップホップ
                    <input type="checkbox" name="genre[]" value="ノイズ" @if(is_array($us_genre) && in_array("ノイズ", $us_genre, true)) checked @endif>ノイズ
                    <input type="checkbox" name="genre[]" value="アニソン/ボカロ" @if(is_array($us_genre) && in_array("アニソン/ボカロ", $us_genre, true)) checked @endif>アニソン/ボカロ
                    </div>
                </div>
                <div class="prof">
                    <span class="title">好きなアーティスト</span>
                    <input type="text" name="artist" value="{{ old('user_detail->artist') ?? $uspro->user_detail->artist}}" style="width:440px;">   
                </div>
                <!--
                <div class="prof">
                    <span class="title">参加しているコミュニティ</span>
                    <input readonly type="text" name="community" value="{{$uspro->user_detail->community}}">
                </div>
                -->
                <div class="prof">
                    <span class="title">URL</span>
                    <input type="url" name="url" value="{{ old('user_detail->url') ?? $uspro->user_detail->url}}" style="width:440px;"> 
                </div>
                <div class="prof" style="height:78px;">
                    <span class="title" style="margin-top: 31px; vertical-align: top;">自己紹介</span>
                    <textarea name="intro" row="10" cols="60" style="margin-top: 14px;">{{ old('user_detail->introduction') ?? $uspro->user_detail->introduction}}</textarea>
                </div>
                <div style="text-align:center; margin-top:25px;">
                <input class="btn-flat-border" type="reset" value="入力内容をクリア">
                <input class="btn-flat-border" type="submit" value="登録">
                </div>
                <input type="hidden" name="id" value="{{$uspro->id}}">
                <input type="hidden" name="community" value="{{$uspro->user_detail->community}}">
                <input type="hidden" name="update_flag" value="1">
            </form>
        <script type="text/javascript">
            /* データベースに入っている値をチェックボックスへ反映するための処理(作成中）
            $(function(){
                if('$us_part'){
                    var part =[];
                    var part = '$us_part';
                    //var partval = $('.part').val()
                    //console.log(partval)
                    console.log(part)
                    $('.part').each(function() {
                    var partval = $(this).val();
                    console.log(partval)
                        for(var i in part){
                            if(partval == part[i]){
                            $('.part').prop("checked", true);  
                            }
                        }
                    })
                }
            });
            */
        </script>
    </div>
@endsection