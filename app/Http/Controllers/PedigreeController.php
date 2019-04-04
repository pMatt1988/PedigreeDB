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


    public function show($id, $nGens)
    {


        $dog = Dog::findOrFail($id);

        $parents = $dog->parents()->get();

        $nGenP2 = pow(2, $nGens);

        $output = "<table><tr><td rowspan='{$nGenP2}'>{$dog->name}</td> " . $this->buildOutput($nGens, $parents) . "</tr></table>";

        return view('dog.pedigree.show', compact('output'));
    }

    protected $iterations = 1;

    protected function buildOutput(Int $nGen, $parents)
    {

        $nGen -= 1;


        $nGenP2 = pow(2, $nGen - 1);

        $string = '';
        $columnWidth = 12;
        if ($nGen > 0) {
            $this->iterations++;
        }


        foreach ($parents as $dog) {

            if ($nGen > 0) {
                $string .= (
                    "<td rowspan='{$nGenP2}'><p>{$dog->name}</p>" .
                    //"<p>{$dog->color}</p>" .

                    "</td>");
                $p = $dog->parents()->get();
                $string .= $this->buildOutput($nGen, $parents);
            }

        }

        if ($nGen == 0) {

            $string .= '</tr><tr>';

        }


        return $string;

    }
}


