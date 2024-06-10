<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class TasksController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\View\View
     */
    public function index()
    {
        $tasks = Tasks::all();
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $task_attributes = $request->validate(['name' => 'required']);

        Tasks::create($task_attributes);

        return redirect('/');

    }

    /**
     * @param Tasks $task
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Tasks $task)
    {
        $task->update(['is_complete' => true]);

        return redirect('/');
    }

    /**
     * @param Tasks $task
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Tasks $task)
    {
        $task->delete();

        return redirect('/');
    }

}
