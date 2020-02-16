@extends('main')

@section('content')
        <div id="" style="height:1000px;padding-left:0px; text-align:left; border-style:groove; ">
                <div style="width:350px; display:inline-block; border-style:groove;">
                メッセージ履歴       
                </div>
                <!--コメント
                <div>
                @foreach ($history as $history)
                        <div>{{$history->senderUser->name}}</div>
                        <div>{{$history->recipientUser->name}}</div>
                        <div>{{$history->message->content}}</div>
                        <div>{{$history->message->created_at}}</div>
                @endforeach
                </div>
                -->
        </div>
        <script src="{{asset('js/app.js')}}" ></script>
@endsection
