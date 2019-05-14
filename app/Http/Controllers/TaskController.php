<?php

namespace App\Http\Controllers;

use Auth;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Task::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $me = Auth::user();
        $meOnly = false;

        if ($me->role !== 'admin') {
            $tasks = $me->tasks()->paginate(25);
        } else {
            if ($user = $request->query('user')) {
                $tasks = $me->tasks()->paginate(25);
                $meOnly = true;
            } else {
                $tasks = Task::latest()
                    ->paginate(25);
            }
        }


        $tasks->load('conflictSeries', 'conflictSeries.justices');

        return view('task.index', compact('tasks', 'meOnly'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select('id', 'name')->get()->mapWithKeys(function($user) {
            return [$user['id'] => $user['name']];
        });
        return view('task.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        
        $redundantTask = Task::where([
            ['conflict_ucdp_id', $request->input('conflict_series')],
            ['user_id', $request->input('user')]
        ])->exists();

        if ($redundantTask) {

        } else {
            $task = new Task;

            $task->user_id = $request->input('user');
            $task->conflict_ucdp_id = $request->input('conflict_series');
            $task->created_by = Auth::id();
            $task->save();
        }
        

        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $status = $request->input('status') ?? false;
        $task->status = $status;
        $task->save();

        $flash = "Task -- " . $task->conflictSeries->name . " -- ";

        if ($status) {
            $flash .= "marked as completed.";
        } else {
            $flash .= "changed back to 'in progress.'";
        }

        return redirect()->route('task.index')->with('status', $flash);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
