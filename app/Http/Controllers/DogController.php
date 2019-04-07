<?php

namespace App\Http\Controllers;

use App\Dog;
use Auth;
use DB;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Image;

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

        $imagePath = $this->handleImage(request()->file('image'));
        $fileName = basename($imagePath);
        $this->makeThumbnail(request()->file('image'),  $fileName);


        $this->deleteImage($dog->image_url);

        $dog->image_url = $fileName;
        $dog->save();

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

    private function handleImage($image)
    {

        $path = config('dog.image-directory');
        $filePath = $image->store($path, 'public');

        return $filePath;


    }

    private function makeThumbnail($image, $fileName, $width = 75)
    {
        $path = config('dog.thumbnail-directory');

        $filePath = $image->storeAs($path, $fileName, 'public');
        $filePath = Storage::disk('public')->path($filePath);

        $thumbnail = Image::make($filePath)->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $thumbnail->save($filePath);


    }

    private function deleteImage($filename, $deleteThumbnail = true)
    {
        if ($filename != null) {
            $path = config('dog.image-directory') . '/';


            if (Storage::disk('public')->exists($path . $filename)) {
                Storage::disk('public')->delete($path . $filename);
            }
            if ($deleteThumbnail) {
                $thumbnailPath = config('dog.thumbnail-directory') . '/';
                if (Storage::disk('public')->exists($thumbnailPath . $filename)) {
                    Storage::disk('public')->delete($thumbnailPath . $filename);
                }
            }
        }

    }
}
