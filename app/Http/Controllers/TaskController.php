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
        $status = $request->query('status') ?? 'all';
        $taskee = null;
        $user = $request->query('user') ?? null;
        $meOnly = ($user == $me->id);
        $viewType = $request->query('view_type') ?? 'user';

        if ($me->role !== 'admin') {
            $tasks = $me->tasks();
        } else {
            if ($user) {
                $tasks = Task::where('user_id', $user);
                $users = null;
            } else {
                $tasks = Task::latest();

                if ($viewType == 'user') {
                    $users = $tasks->pluck('user_id')->unique();
                    $users = User::find($users);
                } else {
                    $users = null;
                }
                //$taskee = $tasks->groupBy('user_id');
            }
        }

        if ($status != 'all') {
            $tasks = $tasks->where('status', $status);
        }

        $tasks->with('conflictSeries', 'conflictSeries.justices');
        $tasks = $tasks->get();

        return view('task.index', compact('tasks', 'users', 'meOnly', 'status'));
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

        $user = User::findOrFail($request->input('user'));

        if ($redundantTask) {
            $status = $user->name . " is already assigned to UCDP #" . $request->input('conflict_series');
        } else {
            $task = new Task;

            $task->user_id = $user->id;
            $task->conflict_ucdp_id = $request->input('conflict_series');
            $task->created_by = Auth::id();
            $task->save();

            $status = "UCPD #" . $task->conflict_ucdp_id . " assigned to " . $task->user->name;
        }
        

        return redirect()->route('task.index')
            ->with('status', $status);
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
