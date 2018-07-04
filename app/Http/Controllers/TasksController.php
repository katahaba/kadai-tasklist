<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    
    public function index()
    {
        if (\Auth::check()){
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            return view('tasks.index',['tasks' => $tasks,]);
        }else{
            return view('welcome');
        }

    }
    
    
    public function show($id)
    {
        $task = Task::find($id);
        if (\Auth::id() === $task->user_id){
            return view('tasks.show',['task'=>$task,]);
        }else{
            return redirect('/');
        }
    }


    public function create()
    {
        $task = new Task;
 	    return view('tasks.create',['task' => $task]);
    }
    
    
    public function store(Request $request)
    {
        $this->validate($request, ['status' => 'required','content' => 'required|max:191',]);
        $request->user()->tasks()->create(['status' => $request->status, 'content' => $request->content,]);
        return redirect('/');
    }
    
    
    public function edit($id)
    {
        $task = Task::find($id);
        if (\Auth::id() === $task->user_id){
            return view('tasks.edit',['task'=>$task,]);
        }else{
            return redirect('/');
        }
    }

    
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        if (\Auth::id() === $task->user_id) {
        $this->validate($request, ['status' => 'required','content' => 'required|max:191',]);
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        return redirect('/');
        }else{
           return redirect('/');
        }
    }

    
    public function destroy($id)
    {
        $task = Task::find($id);
        if (\Auth::id() === $task->user_id){
            $task->delete();
            return redirect('/');
        }else{
            return redirect('/');
        }
            
        
    }
}
