<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
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
     *  Storing the Task
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $task_attributes = $request->validate(['name' => 'required']);

        try {
            Tasks::create($task_attributes);
            return redirect()->route('task.index')
                ->with('success_message','Task Stored .');

        } catch (Exception $e) {

            Log::channel('errorlog')->error('Task Not Stored .'. $e->getMessage());
            return redirect()->route('task.index')
                ->with('error_message','Task Not Stored .');
        }
    }

    /**
     * Updating the Task
     * @param Tasks $task
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Tasks $task)
    {
        try {
            $task->update(['is_complete' => true]);
            return redirect()->route('task.index')
                ->with('success_message','Task marked complete.');

        } catch (Exception $e) {

            Log::channel('errorlog')->error('Task Not Updated .'. $e->getMessage());
            return redirect()->route('task.index')
                ->with('error_message','Task was not marked as complete.');
        }
    }

    /**
     * Deleting the Task
     * @param Tasks $task
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Tasks $task)
    {
        try {
            $task->delete();
            return redirect()->route('task.index')
                ->with('success_message','The task has been deleted.');

        } catch (Exception $e) {
            Log::channel('errorlog')->error('Task not Deleted .'. $e->getMessage());
            return redirect()->route('task.index')
                ->with('error_message','Task not Deleted .');
        }
    }
}
