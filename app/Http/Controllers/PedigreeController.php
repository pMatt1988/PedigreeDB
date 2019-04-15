<?php

namespace App\Http\Controllers;

use App\Dog;
use App\Pedigree\Pedigree;
use DB;

class PedigreeController extends Controller
{

    public function GeneratePedigree()
    {
        return null;
    }

    public function show($id, $nGens)
    {
        $pedigree = new Pedigree();
        $output = $pedigree->generatePed($id, $nGens);
        return view('dog.pedigree.show', compact('output'));
    }

    public function showtestmate($sirename, $damname, $nGens) {
        $pedigree = new Pedigree();
        $output = $pedigree->generateTestmate($sirename, $damname, $nGens);

        //return redirect();
        return view('dog.testmate.show', compact('output'));

    }

    public function posttestmate() {
        $sirename = request()->input('sire');
        $damname = request()->input('dam');

        $nGens = 5;

        return redirect('/testmate/' . $sirename . '/' . $damname . '/' . $nGens);
    }


    public function testmate() {
        return view('dog.testmate.search');
    }


}


