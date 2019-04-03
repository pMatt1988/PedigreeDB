<?php

use App\Http\Controllers\DogController;
use App\Http\Controllers\PedigreeController;

Route::get('dogs', [DogController::class, 'index']);
Route::get('dogs/create', [DogController::class, 'create'])->middleware('auth');
Route::get('dogs/{id}', [DogController::class, 'show']);
Route::post('dogs', [DogController::class, 'store'])->middleware('auth');
Route::get('dogs/{id}/edit', [DogController::class, 'edit'])->middleware('auth');;
Route::patch('dogs/{id}', [DogController::class, 'update'])->middleware('auth');;
Route::delete('dogs/{id}', [DogController::class, 'destroy'])->middleware('admin');;

Route::get('autocomplete/{query}', 'SearchController@result');
Route::get('autocomplete/{query}/{sex}', 'SearchController@resultsex');

Route::get('pedigree/{id}/{nGens}', [PedigreeController::class, 'show']);
