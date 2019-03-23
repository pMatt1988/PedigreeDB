<?php

namespace App\Http\Controllers;

use App\Dog;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function result(Request $request) {
        $result = Dog::where('name', "LIKE", "%{$request->input('search')}%");
        return response()->json($result);
    }
}
