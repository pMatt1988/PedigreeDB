<?php

use App\Http\Controllers\AdvancedSearchController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\PedigreeController;

Route::get('dogs', [DogController::class, 'index'])->name('dogindex');
Route::get('dogs/create', [DogController::class, 'create'])->middleware('auth')->name('dogcreate');

Route::get('dogs/{id}', [DogController::class, 'show'])->name('dogshow');
Route::post('dogs', [DogController::class, 'store'])->middleware('auth')->name('dogstore');
Route::get('dogs/{id}/edit', [DogController::class, 'edit'])->middleware('auth')->name('dogedit');
Route::patch('dogs/{id}', [DogController::class, 'update'])->middleware('auth')->name('dogupdate');
Route::delete('dogs/{id}', [DogController::class, 'destroy'])->middleware('admin')->name('dogdestroy');

Route::get('autocomplete/{query}', 'SearchController@result');
Route::get('autocomplete/{query}/{sex}', 'SearchController@resultsex');


Route::get('dogs/{id}/pedigree/{nGens}', [PedigreeController::class, 'show']);

Route::get('testmate', [PedigreeController::class, 'testmate']);
Route::get('testmate/show', [PedigreeController::class, 'showtestmate']);


Route::get('search', [AdvancedSearchController::class, 'index'])->name('advsearch');
