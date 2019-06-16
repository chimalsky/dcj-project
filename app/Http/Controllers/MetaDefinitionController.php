<?php

namespace App\Http\Controllers;

use App\MetaDefinition;
use Illuminate\Http\Request;

class MetaDefinitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metaDefinitions = MetaDefinition::all();

        return view('meta-definition.index', compact('metaDefinitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meta-definition.create', compact('metaDefinitions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MetaDefinition  $metaDefinition
     * @return \Illuminate\Http\Response
     */
    public function show(MetaDefinition $metaDefinition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MetaDefinition  $metaDefinition
     * @return \Illuminate\Http\Response
     */
    public function edit(MetaDefinition $metaDefinition)
    {
        return view('meta-definition.edit', compact('metaDefinition')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MetaDefinition  $metaDefinition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetaDefinition $metaDefinition)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MetaDefinition  $metaDefinition
     * @return \Illuminate\Http\Response
     */
    public function destroy(MetaDefinition $metaDefinition)
    {
        //
    }
}
