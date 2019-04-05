@extends('mygengo.layout')

@section('content')

    <div>
        <img src="/storage/back/backImg.jpg" alt="" width="400px">
    </div>
    
    {!! Form::model($myGengoImage, ['route' => 'myGengoImages.store']) !!}
        
        {!! Form::label('text','新しい元号を入力') !!}
        {!! Form::text('text',null,['placeholder' => '４文字まで記入が可能です']) !!}
        
        {!! Form::submit('作成') !!}
        
    {!! Form::close() !!}
    
    @if (count($errors) > 0)
    <div>
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </div>
    @endif

@endsection('content')