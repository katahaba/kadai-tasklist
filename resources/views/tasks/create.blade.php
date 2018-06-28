@extends('layouts.app')
@section('content')
    <h1>新規タスク作成</h1>
    {!! Form::model($task,['route'=>'tasks.store','method'=>'post']) !!}
        {!! Form::label('content','タスク名:') !!}
        {!! Form::text('content') !!}
        {!! Form::submit('送信') !!}
    {!! Form::close() !!}
@endsection