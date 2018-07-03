<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    
    public function index()
    {
        $data=[];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = ['user' =>$user,'tasks' =>$tasks];
            $data += $this->counts($user);
            return view('users.show',$data);
        }else{
            return view('welcome');
        }
    }

    
    public function store(Request $request)
    {
        $this->validate($request, ['status' => 'required','content' => 'required|max:191',]);
        
        $task->user()->tasks()->create(['status' => $request->status,]);
        $task->user()->tasks()->create(['content' => $request->content,]);
        
        return redirect()->back();
    }

    
    public function show($id)
    {
        $task = \App\Task::find($id);
        if (\Auth::id() === $task->user_id){
            return view('tasks.show',['task'=>$task,]);
        }
    }

    
    public function edit($id)
    {
        if (\Auth::id() === $task->user_id){
            return view('tasks.edit',['task'=>$task,]);
        }
    }

    
    public function update(Request $request, $id)
    {
        $task = \App\Task::find($id);
        if (\Auth::id() === $task->user_id) {
        $this->validate($request, ['status' => 'required','content' => 'required|max:191',]);
        
        $task->user()->tasks()->create(['status' => $request->status,]);
        $task->user()->tasks()->create(['content' => $request->content,]);
        }
        return redirect()->back();
    }

    
    public function destroy($id)
    {
        $task = \App\Task::find($id);

        if (\Auth::id() === $task->user_id){
            $task->delete();
        }
            return redirect()->back();
        
    }
}
