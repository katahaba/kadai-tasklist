@extends('layouts.app')
@section('content')
    <h1>新規タスク作成</h1>
    
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-2 col-md-6 col-md-offset-2 col-lg-3 col-lg-offset-3">
            {!! Form::model($task,['route'=>'tasks.store','method'=>'post']) !!}
                    
                <div class="form-group">
                        {!! Form::label('status','ステータス:') !!}
                        {!! Form::select('status', ['Not Ready'=>'Not Ready', 'Ready'=>'Ready', 'Doing'=>'Doing', 'Done'=>'Done'], null, ['class' => 'form-control']) !!}
                </div>
            
            
                <div class="form-group"> 
                    {!! Form::label('content','タスク名:') !!}
                    {!! Form::text('content', null, ['class'=>'form-control']) !!}
                </div>  
            
                {!! Form::submit('送信', ['class' => 'btn btn-primary']) !!}
            
            {!! Form::close() !!}
        </div>    
    </div>
@endsection