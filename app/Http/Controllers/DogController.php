<?php

namespace App\Http\Controllers;

use App\Dog;
use Illuminate\Http\Request;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('dog.create');
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
        $validated = $request->validate([
           'name' => 'required',
            'sireid' =>  ['nullable', 'integer'],
            'damid' => ['nullable', 'integer'],
            'sex' => ['required', 'in:male,female'],
            'dob' => ['nullable', 'date_format:mm "/" dd "/" yy'],
            'pretitle' => ['nullable','max:32'],
            'posttitle' => ['nullable', 'max:32'],
            'reg' => ['nullable', 'max:64'],
            'color' => ['nullable', 'max:64'],
            'markings' => ['nullable', 'max:64'],
            'fss' => 'boolean',
            'rat' => 'boolean',
        ]);

        Dog::create($validated);
        return view('dog.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  Dog $dog
     * @return \Illuminate\Http\Response
     */
    public function show(Dog $dog)
    {
        //


        return view('dog.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Dog $dog
     * @return \Illuminate\Http\Response
     */
    public function edit(Dog $dog)
    {
        //

        return view('dog.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Dog $dog
     * @return \Illuminate\Http\Response
     */
    public function update(Dog $dog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dog $dog)
    {
        //
    }
}
