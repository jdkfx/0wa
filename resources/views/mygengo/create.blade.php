@extends('mygengo.layout')

@section('content')

    <div class="generator-form">
        
        <h2>新元号を作ってみよう！</h2>
        <p>フォントの都合で文字が出なかったらごめんね💛</p>
        
        <div class="img">
            <img src="/storage/backimg.jpg" alt="">
        </div>
    
        {!! Form::model($myGengoImage, ['route' => 'myGengoImages.store']) !!}
        
            {!! Form::label('text','新しい元号を入力') !!}
            {!! Form::text('text',null,['placeholder' => '４文字まで記入が可能です（全角のみ）','size' => '22','class' => 'form-input']) !!}
            
            @if (count($errors) > 0)
                <div>
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
        
            {!! Form::submit('作成',['class' => 'form-button']) !!}
        
        {!! Form::close() !!}
        
    </div>

@endsection('content')