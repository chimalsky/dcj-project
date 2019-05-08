<?php

namespace App\Http\Controllers;

use App\Amnesty;
use Illuminate\Http\Request;

class AmnestyController extends Controller
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
        return view('justice.create');
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
     * @param  \App\Amnesty  $amnesty
     * @return \Illuminate\Http\Response
     */
    public function show(Amnesty $amnesty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Amnesty  $amnesty
     * @return \Illuminate\Http\Response
     */
    public function edit(Amnesty $amnesty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Amnesty  $amnesty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amnesty $amnesty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Amnesty  $amnesty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amnesty $amnesty)
    {
        //
    }
}
