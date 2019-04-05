@extends('mygengo.layout')

@section('content')
    
    <div>
        <img src="{{ $myGengoImage->createdImg }}" alt="" width="400px">
    </div>
    <p>オリジナルの元号ができました！</p>
    {!! link_to_route('myGengoImages.index','トップに戻る') !!}

@endsection