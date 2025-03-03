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
        /**
         * Return empty string if input is not present in Query String
         */
        $possible_search = request()->query('searchTerm', '');

        /**
         * If on home page or no search string provided,
         * return all pokemons
         */
        if ($possible_search == "") {
            $pokemons = Pokemon::query()
            ->orderBy("name")
            ->paginate(5);
        }
        /**
         * If search string provided, conduct search
         */
        else {
            $pokemons = Pokemon::query()
            ->where("name", "LIKE", "%". $possible_search ."%")
            ->orderBy("name")
            ->paginate(5);
        }

        return view('home', ['pokemons' => $pokemons, 'last_search' => $possible_search]);
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
        $possible_search = request()->query('searchTerm', '');
        $search_page = request()->query()['searchPage'];
        
        return view('pokemon.show', ['pokemon' => $pokemon, 'searchTerm' => $possible_search, 'searchPage' => $search_page]);
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
