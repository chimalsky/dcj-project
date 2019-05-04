<?php

namespace App\Http\Controllers;

use App\Trial;
use Illuminate\Http\Request;

class TrialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trial = new Trial;
        return view('justice.trial.create', compact('trial'));
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
     * @param  \App\Trial  $trial
     * @return \Illuminate\Http\Response
     */
    public function show(Trial $trial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trial  $trial
     * @return \Illuminate\Http\Response
     */
    public function edit(Trial $trial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trial  $trial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trial $trial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trial  $trial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trial $trial)
    {
        //
    }
}
