<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvancedSearchController extends Controller
{
    //

    public function index(Request $request) {
        $input = $request->input();
        return view('dog.advanced.index', compact('input'));
    }

}
