<?php

namespace App\Http\Controllers;

use App\Dog;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        //MYTODO: Add image uploads
        $validated = $request->validate([
            'name' => ['required', 'unique:dogs,name'],
            'sex' => ['required', 'in:male,female'],
            'dob' => ['nullable', 'date_format:Y-m-d'],
            'pretitle' => ['nullable', 'max:32'],
            'posttitle' => ['nullable', 'max:32'],
            'reg' => ['nullable', 'max:64'],
            'color' => ['nullable', 'max:64'],
            'markings' => ['nullable', 'max:64'],
            'image' => ['nullable', Rule::dimensions()->maxWidth(900)->maxHeight(900)],
            'image_url' => ['nullable', 'url'],
        ]);
        $validated['user_id'] = Auth::id();
        $dog = Dog::create($validated);

        $dog->refresh();
        $sire = Dog::where('name', '=', request('sire'))->first();

        if ($sire != null) {
            DB::table('dog_relationship')->updateOrInsert(
                [
                    'dog_id' => $dog->id,
                    'relation' => 'sire'
                ],
                [
                    'parent_id' => $sire->id
                ]);
        }

        $dam = Dog::where('name', '=', request('dam'))->first();

        if ($dam != null) {
            DB::table('dog_relationship')->updateOrInsert(
                [
                    'dog_id' => $dog->id,
                    'relation' => 'dam'
                ],
                [
                    'parent_id' => $dam->id
                ]);
        }


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
        $dog = Dog::with(['parents'])->findOrFail($id);
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
        $dog = Dog::with('parents')->find($id);

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
            'sire' => ['nullable', 'exists:dogs,name'],
            'dam' => ['nullable', 'exists:dogs,name'],
            'sex' => ['required', 'in:male,female'],
            'dob' => ['nullable', 'date_format:Y-m-d'],
            'pretitle' => ['nullable', 'max:32'],
            'posttitle' => ['nullable', 'max:32'],
            'reg' => ['nullable', 'max:64'],
            'color' => ['nullable', 'max:64'],
            'markings' => ['nullable', 'max:64'],
        ]);

        $dog->update($validated);
        $dog->refresh();

        $sire = Dog::where('name', '=', request('sire'))->first();

        if ($sire != null) {
            DB::table('dog_relationship')->updateOrInsert(
                [
                    'dog_id' => $dog->id,
                    'relation' => 'sire'
                ],
                [
                    'parent_id' => $sire->id
                ]);
        }

        $dam = Dog::where('name', '=', request('dam'))->first();

        if ($dam != null) {
            DB::table('dog_relationship')->updateOrInsert(
                [
                    'dog_id' => $dog->id,
                    'relation' => 'dam'
                ],
                [
                    'parent_id' => $dam->id
                ]);
        }

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
