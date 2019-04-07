<?php

namespace App\Http\Controllers;

use App\Dog;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'image' => ['nullable', 'image', Rule::dimensions()->maxWidth(900)->maxHeight(900)],

        ]);
        $validated['user_id'] = Auth::id();

        $dog = Dog::create($validated);

        //Refresh dog model to make sure our info is up to date!
        $dog->refresh();

        /*
         * Set up relationships
         */
        $this->setUpDogRelationships($dog, ['sire', 'dam']);

        /*
         * Handle image uploads
         */

        if (request()->hasFile('image')) {
            $path = request()->file('image')->store('pedigree/' . $dog->id);
            $dog->image_url = $path;
            $dog->save();
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
            'image' => ['nullable', 'image', Rule::dimensions()->maxWidth(480)->maxHeight(480)],

        ]);

        $dog->update($validated);

        //Refresh dog model to get updated changes.
        $dog->refresh();

        /*
         * Set up relationships
         */
        $this->setUpDogRelationships($dog, ['sire', 'dam']);

        $this->handleImage($dog);

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


    private function setUpDogRelationships($dog, $relations)
    {
        foreach ($relations as $relation) {
            $value = request($relation);
            if ($value === null) continue;

            $parent = Dog::where('name', '=', $value)->first();

            if ($parent != null) {
                DB::table('dog_relationship')->updateOrInsert(
                    [
                        'dog_id' => $dog->id,
                        'relation' => $relation
                    ],
                    [
                        'parent_id' => $parent->id
                    ]);
            }
        }
    }

    private function handleImage(Dog $dog)
    {

        //mytodo: Add Thumbnails
        if (request()->hasFile('image')) {
            if ($dog->image_url != null) {

                $file = '/public/pedigree-img/' . $dog->id . '/' . basename($dog->image_url);
                if (Storage::exists($file))
                    Storage::delete($file);
            }

            $path = request()->file('image')->store('/public/pedigree-img/' . $dog->id);
            $path = '/storage/pedigree-img/' . $dog->id . '/' . basename($path);
            $dog->image_url = $path;
            $dog->save();
        }
    }
}
