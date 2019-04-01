@extends('mygengo.layout')

@section('content')

    <div>
        <img src="/storage/back/backImg.jpg" alt="" width="400px">
    </div>
    
    {!! Form::model($myGengoImage, ['route' => 'myGengoImages.store']) !!}
        
        {!! Form::label('text','新しい元号を入力') !!}
        {!! Form::text('text') !!}
        
        {!! Form::submit('作成') !!}
        
    {!! Form::close() !!}

@endsection('content')