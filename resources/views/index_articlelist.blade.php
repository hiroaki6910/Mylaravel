@extends('main')
@section('content')
        <div style="height:1000px; margin-left:auto; margin-right:auto; padding-left:0px;">
            <div style="padding-left:0px; text-align:left; border-bottom: 1px solid #ccc; height:50px;">
                <a href="{{url('search_article')}}" class="btn-search">検索条件<i class="fas fa-search" style="margin-left:5px;"></i></a>
            </div>
            <div style="width:788px; display:inline-block; margin-left:auto; margin-right:auto;">
                @foreach ($articlelist as $show)
                <div class="pulldown" data-slide="slide{{$show->user_detail->id}}" style="border-bottom: 1px solid #ccc; margin-left:3px">
                    <div>{{$show->title}}</div>
                    <div style="display:inline-block;">
                        <span>{{$show->user->name}}</span>
                        <span>({{$show->user_detail->address}}</span>
                        <span>{{$show->user_detail->age}}歳</span>
                        <span>{{$show->user_detail->gender}}性)</span>
                    </div>
                </div>
                <div class="pulldown-body slide{{$show->user_detail->id}}">
                    <div class="title_article">記事の内容</div>
                        <div class="title_article_content" style="margin-bottom:12px;">{{$show->content}}</div>
                    <div class="title_article">基本情報</div> 
                    <dl class="title_article_content" style="display:inline-block; margin-right: 40px; margin-bottom:0px;">
                        <dt style="float:left; clear:left; width:105px;">活動エリア</dt>
                            <dd style="float:left;">{{$show->area}}</dd>
                        <dt style="float:left; clear:left; width:105px;">活動曜日</dt>
                            <dd style="float:left;">{{$show->day}}</dd>
                        <dt style="float:left; clear:left; width:105px;">方向性</dt>
                            <dd style="float:left;">{{$show->direction}}</dd>
                    </dl>
                    <dl style="display:inline-block; vertical-align:top;">
                        <dt style="float:left; clear:left; width:105px;">楽曲</dt>
                            <dd style="float:left;">{{$show->song}}</dd>
                        <dt style="float:left; clear:left; width:105px;">募集する年齢</dt>
                            <dd style="float:left;">{{$show->articleage}}</dd>
                    </dl>
                    <div class="title_article">募集するパート</div>
                    <dl>
                        <dt>
                            <dd class="title_article_content">{{$show->part}}</dd>
                        </dt>    
                    </dl>    
                    <div class="title_article">バンドのジャンル</div> 
                        <dt>
                            <dd class="title_article_content">{{$show->genre}}</dd>
                        </dt>
                    <div class="title_article">音源</div> 
                        <dt>
                            <dd class="title_article_content">{{$show->demo}}</dd>
                        </dt>
                    <div style="display:inline-block; text-align:right; width:786px;">
                        <span>投稿者:</span>
                        <span>{{$show->user->name}}</span>
                        <span>({{$show->user_detail->address}}</span>
                        <span>{{$show->user_detail->age}}歳</span>
                        <span>{{$show->user_detail->gender}}性)</span>
                    </div>
                    <div style="display:inline-block; text-align:right; width:786px;">
                        <span>投稿日:</span>
                        <span>{{$show->created_at}}</span>
                    </div>
                </div>
                @endforeach
            </div>
            <script type="text/javascript">
            $('.pulldown').on('click', function(){
                $('.' + $(this).data('slide')).slideToggle(700);
            });
            </script>
        </div>
@endsection