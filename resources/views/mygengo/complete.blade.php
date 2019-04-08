@extends('mygengo.layout')

@section('content')
    
    <div class="complete">
        <h2>新元号を作ってみよう！</h2>
        <p>フォントの都合で文字が出なかったらごめんね💛</p>
    
        <div class="img">
            <img src="{{ $myGengoImage->createdImg }}" alt="">
        </div>
        <p>オリジナルの元号ができました！</p>
    
        {!! link_to_route('myGengoImages.index','トップに戻る') !!}
        
    </div>

@endsection