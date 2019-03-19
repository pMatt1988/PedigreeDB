<?php

namespace App;

use Awobaz\Compoships\Compoships;
use Illuminate\Database\Eloquent\Model;


class Dog extends Model
{
    //

    use Compoships;



    protected $fillable = [
        'name',
        'sireid',
        'damid',
        'sex',
        'dob',
        'pretitle',
        'posttitle',
        'reg',
        'color',
        'markings',
        'fss',
        'rat',
    ];

    public function user() {
        //return $user = Dog::hasOne('App\User', 'id', 'user');

        return $user = $this->belongsTo('App\Models\Auth\User');
    }

    public function sire() {
        return $sire = $this->hasOne(Dog::class, 'id', 'sireid');
    }

    public function dam() {
        return $dam = $this->hasOne(Dog::class, 'id', 'damid');
    }

    public function offspring() {
        return $offspring = $this->hasMany(Dog::class, 'id', ['sireid', 'damid']);
    }
}
