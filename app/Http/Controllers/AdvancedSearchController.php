<?php

namespace App\Http\Controllers;

use App\Dog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdvancedSearchController extends Controller
{
    //

    public function index(Request $request)
    {

        $result = null;

        $name = $request->input('name');
        $from = $request->input('from-date');
        $to = $request->input('to-date');
        $color = $request->input('color');
        $markings = $request->input('markings');

        // $query = Dog::all();

        if ($request->input() != null) {

            $query = Dog::where('name', 'LIKE', $name ?? null);

            if ($from !== null) {
                if ($to === null)
                    $to = Carbon::now()->format('Y-m-d');
                $query = $query->whereBetween('dob', [$from, $to]);
            } else if ($to !== null && $from === null) {


                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'Date' => ['The "From" field needs to be filled out to search by date range.'],
                ]);
                throw $error;
            }

            if ($color != null) {
                $query = $query->where('color', 'LIKE', $color);
            }

            if ($markings != null) {
                $query = $query->where('markings', 'LIKE', $markings);
            }
            $result = $query->get();
        }


        return view('dog.advanced.index', compact('result'));
    }

}
