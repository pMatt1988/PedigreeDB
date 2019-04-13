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
        $dog = Dog::with([$nestString => function ($query) {
            $query->select('id', 'name', 'image_url', 'dob');
        }])->findOrFail($id);


        $nGenP2 = pow(2, $nGens);

        $color = $dog->sex === 'female' ? 'table-light text-dark' : 'table-primary text-dark';

        $pretitle = $dog->pretitle !== null ? '<span class="text-primary">'. $dog->pretitle .'</span> <br>' : null;
        $dogname = $dog->name !== null ? $dog->name . '<br>' : 'N/a';
        $posttitle = $dog->posttitle !== null ? '<span class="text-danger">'. $dog->posttitle .'</span> <br>' : null;
        $image = $dog->image_url !== null ? '<div><img src="/storage/pedigree-img/thumbnails/'
            . $dog->image_url . '" alt="Dog Thumb"></div>' : null;
        $date = $dog->dob !== null ? $dog->dob->format('Y') : null;


        //$output = null;
        $output = '<table><tr><td rowspan="' . $nGenP2 . '" class="' . $color . '">' .$pretitle . $dogname . $posttitle . $image . $date . '</td>' . $this->buildOutput($nGens, $this->GetParentsArray($dog)) . '</tr></table>';
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
                $color = ($dog->sex === 'female') ? 'table-light text-dark' :
                    (($dog->sex === 'male') ? 'table-primary text-dark' : 'table-danger text-dark');

                $pretitle = $dog->pretitle !== null ? '<span class="text-primary">'. $dog->pretitle .'</span> <br>' : null;
                $dogname = $dog->name !== null ? $dog->name . '<br>' : 'N/a';
                $posttitle = $dog->posttitle !== null ? '<span class="text-danger">'. $dog->posttitle .'</span> <br>' : null;
                $image = $dog->image_url !== null ? '<div><img src="/storage/pedigree-img/thumbnails/'
                    . $dog->image_url . '" alt="Dog Thumb"></div>' : null;
                $date = $dog->dob !== null ? $dog->dob->format('Y') : null;


                $string .= (
                    '<td rowspan="' . $nGenP2 . '" class="' . $color . '"> <a href="/dogs/' . $dog->id . '"><div>'
                    . $pretitle
                    . $dogname
                    . $posttitle
                    . $image
                    . $date
                    . '</div></a></td>');
                $string .= $this->buildOutput($nGen, $this->GetParentsArray($dog));

            }
            if ($nGen == 0) {

                $string .= '</tr><tr>';

            }
        }
        return $string;

    }


    protected function GetParentsArray($dog)
    {
        $parents = [
            $dog->father() ?? new Dog(),
            $dog->mother() ?? new Dog()
        ];
        return $parents;
    }
}


