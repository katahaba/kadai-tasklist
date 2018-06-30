@extends('layouts.app')
@section('content')
    <h1>{{ $task->id }}の内容編集</h1>
    
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-2 col-md-6 col-md-offset-2 col-lg-3 col-lg-offset-3">
            
            {!! Form::model($task,['route'=>['tasks.update',$task->id],'method'=>'put']) !!}
                
                <div class="form-group">
                        {!! Form::label('status','ステータス:') !!}
                        {!! Form::select('status', ['Not Ready'=>'Not Ready', 'Ready'=>'Ready', 'Doing'=>'Doing', 'Done'=>'Done'], null, ['class' => 'form-control']) !!}
                </div>
            
                <div class="form-group"> 
                        {!! Form::label('content','タスク名:') !!}
                        {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-success']) !!}    
            
            {!! Form::close() !!}
        </div> 
    </div>    
@endsection