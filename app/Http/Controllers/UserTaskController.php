<?php

namespace App\Http\Controllers;

use App\ConflictSeries;
use App\Task;
use App\User;
use Auth;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $me = Auth::user();
        $status = $request->query('status') ?? 'all';

        $tasks = $user->tasks()->with('assigner', 'conflictSeries')
            ->withCount('conflictEpisodes', 'conflictJustices');

        if ($status != 'all') {
            $tasks = $tasks->where('status', $status);
        }

        if ($region = trim($request->query('region'))) {
            $conflictSeries = ConflictSeries::with('episodes')->get()->filter(function ($cs) use ($region) {
                return $region == $cs->region;
            });

            $tasks = $tasks->whereIn('conflict_ucdp_id', $conflictSeries->pluck('id'));
        }

        $tasks = $tasks->latest('updated_at')->paginate(30);

        $meOnly = false;
        $viewType = null;

        return view('user.task.index', compact('tasks', 'user', 'status', 'meOnly', 'viewType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Task $task)
    {
        //
    }
}
