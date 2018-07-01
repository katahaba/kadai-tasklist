@extends('layouts.app')
@section('content')
    <h1>タスク一覧</h1>
    <p>(編集・削除はID番号をクリック)</p>
    
    @if (count($tasks)>0)
        <ul>
            <table class="table table-striped table-bordered table-condensed">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Task_Name</th>
                </tr>
                @foreach ($tasks as $task)
                    <tr>
                        <td class="text-center">{!! link_to_route('tasks.show',$task->id,['id'=>$task->id]) !!}</td>
                        <td class="text-center">{{ $task->status }}</td>
                        <td class="text-center">{{ $task->content }}</td>
                    </tr>
                @endforeach
            </table>
        </ul>
    @endif
    
    {!! link_to_route('tasks.create','新規タスク作成') !!}
@endsection
