@extends('mygengo.layout')

@section('content')
    
    <div class="generator">
        <h2>新元号を作ってみよう！</h2>
        <p>フォントの都合で文字が出なかったらごめんね💛</p>
        
        <div class="img">
            <img src="/storage/app/public/back/backimg.jpg" alt="">
        </div>
        
        <h3>〈元号を作成〉ボタンを押して作成してみよう！</h3>
        
        {!! link_to_route('myGengoImages.create','元号を作成') !!}
    </div>
    
    <div class="contents">
        <h3>最新の１０件</h3>
            
            @if(count($myGengoImages) > 0)
                <ul>
                    @foreach($myGengoImages as $myGengoImage)
                        <li><img src="{{ $myGengoImage->createdImg }}" alt=""></li>
                    @endforeach
                </ul>
            @endif
        
        <h3>更新すると最新の元号をみることができるよ！</h3>
    </div>

@endsection