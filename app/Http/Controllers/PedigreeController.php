<?php

namespace App\Http\Controllers;

use App\Dog;

class PedigreeController extends Controller
{

    public function GeneratePedigree($id)
    {
        $dog = Dog::findOrFail($id);
        dd($dog->parents()->get());
    }

    protected $nGens = 5;

    public function show($id, $nGens)
    {
        $dog = Dog::findOrFail($id);

        $parents = $dog->parents()->get();

        $output = $this->buildOutput($nGens - 1, $parents);

        return view('dog.pedigree.show', compact('output'));
    }

    protected function buildOutput(Int $nGen, $parents)
    {
        $maleSire = null;
        $maleDam = null;
        $femaleSire = null;
        $femaleDam = null;

        $string = '<div>';
        $columnWidth = 12;
        if ($nGen > 1) {
            $columnWidth = 12 / $nGen;

        }

        foreach ($parents as $parent) {

            $string .= "<div class='row'><div class='border border-danger col-{$columnWidth}'>$parent->name</div>";
            if ($nGen > 0) {
                $string .= "<div class='col'>";
                $p = $parent->parents()->get();
                $string .= $this->buildOutput($nGen - 1, $p);
                $string .= "</div>";
            }

            $string .= "</div>";

        }


        return $string . "</div>";

    }
}


