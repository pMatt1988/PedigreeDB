<?php

namespace App\Pedigree;
use App\Dog;

class Pedigree{

    protected $sql;

    public function Generate(Dog $dog) {
        dd($dog->father()->toSql());
    }

}