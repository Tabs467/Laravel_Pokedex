<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\Models\Pokemon;

/**
 * Add the next set of 5 pokemon to the database
 */
Artisan::command('add:pokemon', function () {
    /**
     * Retrieve total pokemon count
     */
    $total_pokemon = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0'), true)['count'];

    if (Pokemon::count() <= $total_pokemon) {
        /**
         * Do not insert already added pokemon
         */
        $offset = Pokemon::count();

        /**
         * JSON containing the name of each pokemon plus a link to their individual JSON
         */
        $all_pokemon_json = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=5&offset='.$offset), true);

        // TODO: Add log of failure to retrieve this JSON
        if ($all_pokemon_json != null) {
            $all_pokemon_collection = collect($all_pokemon_json);
            
            foreach ($all_pokemon_collection['results'] as $pokemon_link) {
                /**
                 * Individual pokemon json
                 */
                $pokemon_json = json_decode(file_get_contents($pokemon_link['url']), true);
                if ($pokemon_json != null) {
                    $pokemon_collection = collect($pokemon_json);

                    $pokemon = new Pokemon();
                    /**
                     * Fill Pokemon attributes
                     */
                    $pokemon->name = $pokemon_collection->get('name');
                    $pokemon->species = $pokemon_collection->get('species')['name'];
                    $pokemon->height = $pokemon_collection->get('height');
                    $pokemon->weight = $pokemon_collection->get('weight');
                    $pokemon->abilities = json_encode($pokemon_collection->get('abilities'));
                    /**
                     * TODO: Replace placeholder image
                     */
                    $pokemon->image_path = "images/Poke_Ball.png";

                    /**
                     * Save formatted pokemon to the db
                     */
                    $pokemon->save();
                }
                /**
                 * Attempt to process more pokemon if the current one is not valid JSON
                 */
                // TODO: Add log of failure to add pokemon - so none can be missed
                else {
                    continue;
                }
            }
        }
    }
})->everyMinute();

// TODO: Add a job that runs every day or week to check if any json information has changed - and if so update our pokemon database