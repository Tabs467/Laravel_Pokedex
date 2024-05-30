<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemons = Pokemon::query()
            ->orderBy("name")
            ->paginate(5);

        return view('home', ['pokemons' => $pokemons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        $decoded_abilities = json_decode($pokemon->abilities);
        $formatted_abilities = array();
        $ability_index = 0;
        foreach ($decoded_abilities as $ability) {
            $formatted_abilities[$ability_index]['name'] = $ability->ability->name;
            $formatted_abilities[$ability_index]['is_hidden'] = $ability->is_hidden ? 'Ability hidden' : 'Ability not hidden';
            $formatted_abilities[$ability_index]['slot'] = $ability->slot;
            $ability_index++;
        }

        $pokemon->abilities = $formatted_abilities;

        return view('pokemon.show', ['pokemon' => $pokemon]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        //
    }
}
