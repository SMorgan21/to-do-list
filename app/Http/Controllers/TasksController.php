<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Tasks::all();
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    public function store(Request $request)
    {
        $task_attributes = $request->validate(['name' => 'required']);

        Tasks::create($task_attributes);

        return redirect('/');

    }


}
