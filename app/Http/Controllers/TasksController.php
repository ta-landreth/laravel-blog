<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index() {
        
        //this is Laravel's query builder!  has different functionality/functions, i.e.  ->latest()  or get('created_at', '>=', 'value'),  etc.
        //$tasks = DB::table('tasks')->get();

        //Eloquent syntax
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));

    }

    public function show(Task $task) {

    //$task = Task::find($id); --> replaced with Task $task argument

    return view('tasks.show', compact('task'));

    }
}
