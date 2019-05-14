<?php

namespace App\Http\Controllers;

use Auth;
use App\ConflictSeries;
use Illuminate\Http\Request;

class ConflictSeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conflictSeries = ConflictSeries::paginate(75);

        return view('conflict-series.index', compact('conflictSeries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConflictSeries  $conflictSeries
     * @return \Illuminate\Http\Response
     */
    public function show(ConflictSeries $conflictSeries, Request $request)
    {
        $taskWorkflow = $request->query('task') ?? false;

        if ($taskWorkflow && !Auth::check()) {
            return redirect()->route('login');
        }

        $conflictSeries->withCount(['justices']);

        return view('conflict-series.show', compact('conflictSeries', 'taskWorkflow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConflictSeries  $conflictSeries
     * @return \Illuminate\Http\Response
     */
    public function edit(ConflictSeries $conflictSeries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConflictSeries  $conflictSeries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConflictSeries $conflictSeries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConflictSeries  $conflictSeries
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConflictSeries $conflictSeries)
    {
        //
    }
}
