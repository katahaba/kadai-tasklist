@extends('layouts.app')
@section('content')
    <h3>id={{ $task->id }}のタスク詳細</h3>
    
    <p>ステータス: {{ $task->status }}</p>
    <p>タスク名  : {{ $task->content }}</p>
    {!! link_to_route('tasks.edit','編集',['id'=>$task->id]) !!}
    
    {!! Form::model($task,['route'=>['tasks.destroy',$task->id], 'method'=>'delete']) !!}   
        {!! Form::submit('削除') !!}
    {!! Form::close() !!}
    
    {!! link_to_route('tasks.index','一覧へ戻る') !!}
    
@endsection