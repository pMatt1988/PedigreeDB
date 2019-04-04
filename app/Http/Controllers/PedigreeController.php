<?php

namespace App\Http\Controllers;

use App\Dog;

class PedigreeController extends Controller
{

    public function GeneratePedigree($id)
    {
        $dog = Dog::findOrFail($id);
        $dog->offspring;
        dd($dog);
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

        foreach ($parents as $dog) {

            $string .= "<div class='row'><div class='border border-dark col-3'>{$dog['name']}</div>";
            if ($nGen > 0) {
                $string .= "<div class='col'>";
                $p = $dog->parents()->get();
                $string .= $this->buildOutput($nGen - 1, $p);
                $string .= "</div>";
            }

            $string .= "</div>";

        }


        return $string . "</div>";

    }
}


