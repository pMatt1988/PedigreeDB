<?php

namespace App\Http\Controllers;

use App\Dog;
use Auth;
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
        $dogs = Dog::all();
        return view('dog.index', compact('dogs'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'unique:dogs,name'],
            'sire' => ['nullable'],
            'dam' => ['nullable'],
            'sex' => ['required', 'in:male,female'],
            'dob' => ['nullable', 'date_format:Y-m-d'],
            'pretitle' => ['nullable', 'max:32'],
            'posttitle' => ['nullable', 'max:32'],
            'reg' => ['nullable', 'max:64'],
            'color' => ['nullable', 'max:64'],
            'markings' => ['nullable', 'max:64'],
        ]);
        $validated['user_id'] = Auth::id();

        $sire = Dog::where('name', '=', $validated['sire']);
        if ($sire)
            $validated['sire_id'] = $sire->id;

        $dam = Dog::where('name', '=', $validated['dam']);
        if ($dam)
            $validated['dam_id'] = $dam->id;

        Dog::create($validated);

        return redirect('dogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $dog = Dog::findOrFail($id);

        return view('dog.show', compact('dog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dog = Dog::find($id);

        return view('dog.edit', compact('dog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $dog = Dog::findOrFail($id);
        $validated = request()->validate([
            'name' => ['required'],
            'sire' => ['nullable'],
            'dam' => ['nullable'],
            'sex' => ['required', 'in:male,female'],
            'dob' => ['nullable', 'date_format:Y-m-d'],
            'pretitle' => ['nullable', 'max:32'],
            'posttitle' => ['nullable', 'max:32'],
            'reg' => ['nullable', 'max:64'],
            'color' => ['nullable', 'max:64'],
            'markings' => ['nullable', 'max:64'],
        ]);

        $sire = Dog::where('name', '=', $validated['sire']);
        if ($sire)
            $validated['sire_id'] = $sire->id;

        $dam = Dog::where('name', '=', $validated['dam']);
        if ($dam)
            $validated['dam_id'] = $dam->id;

        $dog->update($validated);

        return redirect('dogs/' . $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Dog::destroy($id);

        return redirect('/dogs/');
    }
}
