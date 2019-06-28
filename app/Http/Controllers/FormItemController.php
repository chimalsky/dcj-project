<?php

namespace App\Http\Controllers;

use App\Form;
use App\FormItem;
use Illuminate\Http\Request;

class FormItemController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Form $form, Request $request)
    {
        $formItem = new FormItem([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'label' => $request->input('label'),
            'options' => $request->input('options')
        ]);

        $form->addItem($formItem);

        $form->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormItem  $formItem
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form, FormItem $formItem)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormItem  $formItem
     * @return \Illuminate\Http\Response
     */
    public function edit(FormItem $formItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormItem  $formItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormItem $formItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Form $form
     * @param  \App\FormItem  $formItem
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form, FormItem $formItem, Request $request)
    {
        $itemName = $request->input('name');

        // Todo : move away from the schemaless system so that we can obviate 
        // functions like this.

        $itemIndex = $form->items->pluck('name')->search($itemName);

        $form->schema->set("meta[$itemIndex]", null);

        $form->save();

        return redirect()->route('form.edit', $form)
            ->with('status', "$itemName has been removed from $form->name form");
    }
}
