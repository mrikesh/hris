<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        return view("todoApp");
    }

    public function create(Request $request){
        $task = new Todo;
        $task->task_title = $request['taskTitle'];  //task_title(database column name) taskTitle(form field name)
        $task->task_desc = $request['taskDesc'];
        $task->save();

        return redirect('todoapp'); //url
    }

    public function view(){
        $task = Todo::all();
        $data = compact('task');
        return view('todoapp')->with($data);
    }

    public function delete($id){
        $task = Todo::find($id);
        if(!is_null($task)){
            $task->delete();
        }
        return redirect('todoapp');

    }

    public function edit($id){
        $task = Todo::find($id);
        if(is_null($task)){
            return redirect('todoapp');
        }else{
            $data = compact('task');
            return view('editTodo')->with($data);
        }
    }

    public function update(Request $request, $id){
        $task = Todo::find($id);
        $task->task_title = $request['taskTitle'];  //task_title(database column name) taskTitle(form field name)
        $task->task_desc = $request['taskDesc'];
        $task->save();

        return redirect('todoapp');
    }
}
