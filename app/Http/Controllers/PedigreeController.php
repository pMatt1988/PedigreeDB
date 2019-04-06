<?php

namespace App\Http\Controllers;

use App\Dog;
use DB;

class PedigreeController extends Controller
{

    public function GeneratePedigree($id)
    {
        $dog =
            Dog::findOrFail($id);

        dd($this->GetParentsArray($dog));

    }

    public function show($id, $nGens)
    {
        $nest = [];
        for ($i = 0; $i < $nGens; $i++) {
            $nest[] = 'parents';
        }
        $nestString = implode('.', $nest);
        $start = microtime(true);
        $dog = Dog::with($nestString)->findOrFail($id);
        $time = microtime(true) - $start;
        echo $time;


        $nGenP2 = pow(2, $nGens);

        $color = $dog->sex == 'female' ? 'table-light text-dark' : 'table-primary text-dark';

        //$output = null;
        $output = "<table><tr><td rowspan='{$nGenP2}' class='$color'>{$dog->name}</td>" . $this->buildOutput($nGens, $this->GetParentsArray($dog)) . "</tr></table>";
        return view('dog.pedigree.show', compact('output'));
    }

    protected $iterations = 1;

    protected function buildOutput(Int $nGen, $parents)
    {
        $nGen -= 1;

        $nGenP2 = pow(2, $nGen);

        $string = '';
        $this->iterations++;



        foreach ($parents as $dog) {


            if ($nGen > 0) {
                $color = $dog->sex == 'female' ? 'table-light text-dark' : 'table-primary text-dark';
                if($dog->sex == null) $color = 'table-danger text-dark';
                $dogname = $dog->name ?? 'N/a';
                $string .= (
                    "<td rowspan='{$nGenP2}' class='$color'><p>{$dogname}</p>" .
                    //"<p>{$dog->color}</p>" .

                    "</td>");
                $string .= $this->buildOutput($nGen, $this->GetParentsArray($dog));

            }
            if ($nGen == 0) {

                $string .= '</tr><tr>';

            }
        }
        return $string;

    }


    protected function GetParentsArray($dog) {
        $parents =  [
            $dog->father() ?? new Dog(),
            $dog->mother() ?? new Dog()
        ];
        return $parents;
    }
}


