<?php

namespace App\Http\Controllers;

use App\MetaSchema;
use Illuminate\Http\Request;

class MetaSchemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MetaSchema::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meta-schema.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $metaSchema = MetaSchema::create($request->all());

        return view('meta.schema.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MetaSchema  $metaSchema
     * @return \Illuminate\Http\Response
     */
    public function show(MetaSchema $metaSchema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MetaSchema  $metaSchema
     * @return \Illuminate\Http\Response
     */
    public function edit(MetaSchema $metaSchema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MetaSchema  $metaSchema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetaSchema $metaSchema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MetaSchema  $metaSchema
     * @return \Illuminate\Http\Response
     */
    public function destroy(MetaSchema $metaSchema)
    {
        //
    }
}
