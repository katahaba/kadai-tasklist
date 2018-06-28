@extends('layouts.app')
@section('content')
    <h1>{{ $task->id }}の内容編集</h1>
    {!! Form::model($task,['route'=>['tasks.update',$task->id],'method'=>'put']) !!}
        {!! Form::label('content','タスク名:') !!}
        {!! Form::text('content') !!}
        {!! Form::submit('更新') !!}
    {!! Form::close() !!}
@endsection