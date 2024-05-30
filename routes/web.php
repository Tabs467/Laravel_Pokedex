<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PokemonController;

Route::get('/', [PokemonController::class,'index'])->name('pokemon.index');

Route::get('/pokemon/{pokemon}', [PokemonController::class,'show'])->name('pokemon.show');

// TODO: create route /pokemon/search that also goes to pokemon.index controller function