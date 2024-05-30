<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\Models\Pokemon;


Artisan::command('refresh:pokemon', function () {
    /**
     * Truncate pokemon
     */
    DB::table('pokemon')->truncate();

    /**
     * Refresh pokemon
     * 
     * JSON containing the name of each pokemon plus a link to their individual JSON
     */
    $all_pokemon_json = json_decode(file_get_contents('https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0'), true);

    if ($all_pokemon_json != null) {
        $all_pokemon_collection = collect($all_pokemon_json);

        $test_limit_index = 0;
        foreach ($all_pokemon_collection['results'] as $pokemon_link) {
            if (10 <= $test_limit_index) {
                break;
            }
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
            else {
                continue;
            }
            $test_limit_index++;
        }
    }
})->everyOddHour();