<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;
use App\Http\Requests\AttributeRequest;

class AttributeController extends Controller
{
    private $attribute;

    public function __construct(Attribute $attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('attribute.index', ['attributes' => $this->attribute->get()]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        $this->attribute->create(['name' => $request->name]);
        return $this->index();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        return view('attribute.edit', ['attribute' => $attribute]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, Attribute $attribute)
    {

        $attribute->update($request->all());
        return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(attribute $attribute)
    {
        //
    }
}
