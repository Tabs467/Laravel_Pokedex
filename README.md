# Pokedex made in Laravel using the Poke API V2 (https://pokeapi.co)
Originally started out as a technical test as part of an interview process, but I am still adding to it to expand my Laravel skills.
The Pokedex is populated using a scheduled job to pull a group of 5 pokemon at a time.

# Notes
On a local environment, to populate the pokemon table, ensure to run:     php artisan schedule:work
