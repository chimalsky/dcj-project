<?php

namespace App\Http\Controllers;

use App\Conflict;
use App\Justice;
use Illuminate\Http\Request;

class JusticeController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Justice::class);
    }
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
    public function create(Conflict $conflict, Request $request)
    {
        $justiceType = $request->input('justice_type') ?? null;
        $justice = new Justice;
        $justice->type = $justiceType;

        return view('justice.create', compact('justice', 'conflict', 'justiceType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Conflict $conflict, Request $request)
    {
        $justiceableParams = $request->input('justiceable') ?? [];
        $justiceParams = $request->except(['justiceable', 'task']);
        $task = $request->input('task') ?? null;
        $justice = Justice::create($justiceParams);

        $type = ucfirst($justice->type);
        $justiceTypeClass = "App\\$type";

        $justiceable = new $justiceTypeClass();
        $justiceable->fill($justiceableParams);
        $justiceable->save();

        $justiceable->justice()->save($justice);

        if ($relatedDcj = $justice->related) {
            $related = Justice::where('dcjid', $relatedDcj)->first();
            $related->related = $justice->dcjid;
            $related->save();
        }

        return redirect()->route('conflict.show', ['conflict' => $justice->conflict, 'task' => $task])
            ->with('status', "$type $justice->dcjid created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Justice  $justice
     * @return \Illuminate\Http\Response
     */
    public function show(Justice $justice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Justice  $justice
     * @return \Illuminate\Http\Response
     */
    public function edit(Conflict $conflict, Justice $justice, Request $request)
    {
        $type = $request->input('type');
        
        return view('justice.edit', compact('justice', 'conflict', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Justice  $justice
     * @return \Illuminate\Http\Response
     */
    public function update(Conflict $conflict, Request $request, Justice $justice)
    {
        $justiceableParams = $request->input('justiceable') ?? [];
        $justiceParams = $request->except(['justiceable', 'task']);

        $task = $request->input('task') ?? null;

        $justice->update($justiceParams);
        $justice->justiceable()->update($justiceableParams);

        $justice->save();

        if ($relatedDcj = $justice->related) {
            $related = Justice::where('dcjid', $relatedDcj)->first();
            $related->related = $justice->dcjid;
            $related->save();
        }

        return redirect()->route('conflict.show', compact('conflict', 'justice', 'task'))
            ->with('status', ucfirst($justice->type) . " $justice->dcjid updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Justice  $justice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conflict $conflict, Justice $justice, Request $request)
    {
        Justice::destroy($justice->id);
        $task = $request->input('task') ?? null;

        return redirect()->route('conflict.show', compact('conflict', 'justice', 'task'))
            ->with('status', ucfirst($justice->type) . " $justice->dcjid was deleted");

    }
}
