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
            'sire_id' => ['integer'],
            'dam_id' => ['integer'],
            'sex' => ['required', 'in:male,female'],
            'dob' => ['nullable', 'date_format:Y-m-d'],
            'pretitle' => ['nullable', 'max:32'],
            'posttitle' => ['nullable', 'max:32'],
            'reg' => ['nullable', 'max:64'],
            'color' => ['nullable', 'max:64'],
            'markings' => ['nullable', 'max:64'],
        ]);
        $validated['user_id'] = Auth::id();

        if (request('sire') != null) {
            $sire = Dog::where('name', request('sire'))->first();
            if ($sire != null) {
                if($sire->sex == "female"){
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'sire' => ['The dog that you have selected in the sire field is not female.'],
                    ]);
                    throw $error;
                }
                $validated['sire_id'] = $sire->id;
            } else {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'sire' => ['The sire that you have selected does not exist in the database.
                    Please create the sire first or leave this field blank.'],
                ]);
                throw $error;
            }

        }

        if (request('dam') != null) {

            $dam = Dog::where('name', request('dam'))->first();
            if ($dam != null) {
                if($dam->sex == "male"){
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'dam' => ['The dog that you have selected in the dam field is not female.'],
                    ]);
                    throw $error;
                }
                $validated['dam_id'] = $dam->id;
            } else {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'dam' => ['The dam that you have selected does not exist in the database.
                    Please create the dam first or leave this field blank.'],
                ]);
                throw $error;
            }

        }


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
        $dog = Dog::with(['mother', 'father'])->findOrFail($id);

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
        $dog = Dog::with(['mother', 'father'])->find($id);

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
            'sire_id' => ['integer'],
            'dam_id' => ['integer'],
            'sex' => ['required', 'in:male,female'],
            'dob' => ['nullable', 'date_format:Y-m-d'],
            'pretitle' => ['nullable', 'max:32'],
            'posttitle' => ['nullable', 'max:32'],
            'reg' => ['nullable', 'max:64'],
            'color' => ['nullable', 'max:64'],
            'markings' => ['nullable', 'max:64'],
        ]);

        if (request('sire') != null) {
            $sire = Dog::where('name', request('sire'))->first();
            if ($sire != null) {
                if($sire->sex == "female"){
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'sire' => ['The dog that you have selected in the sire field is not female.'],
                    ]);
                    throw $error;
                }
                $validated['sire_id'] = $sire->id;
            } else {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'sire' => ['The sire that you have selected does not exist in the database.
                    Please create the sire first or leave this field blank.'],
                ]);
                throw $error;
            }

        }

        if (request('dam') != null) {

            $dam = Dog::where('name', request('dam'))->first();
            if ($dam != null) {
                if($dam->sex == "male"){
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'dam' => ['The dog that you have selected in the dam field is not female.'],
                    ]);
                    throw $error;
                }
                $validated['dam_id'] = $dam->id;
            } else {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'dam' => ['The dam that you have selected does not exist in the database.
                    Please create the dam first or leave this field blank.'],
                ]);
                throw $error;
            }

        }

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
