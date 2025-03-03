# About
Pokedex made in Laravel using the Poke API V2 (https://pokeapi.co).
Originally, this project started as a technical test for an interview, but I have continued working on it to further develop my Laravel skills. The Pokedex is automatically populated through a scheduled job that fetches data for five Pokemon at a time.

# Notes
On a local environment, to populate the pokemon table, ensure to run:     php artisan schedule:work
