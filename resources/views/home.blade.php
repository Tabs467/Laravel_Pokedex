<x-layouts.app>
    <div class="flex flex-col">
        <div class="mx-auto py-40">
            <h1 class="font-extrabold font-mono text-7xl">Pokédex</h1>
        </div>
        <div class="px-4 py-2">
            <div class="max-w-md mx-auto">
                <form method="GET" action="{{ route('pokemon.search') }}" class="flex">
                    <input class="w-full rounded-md px-3 py-2" id="search_term" name="search_term" placeholder="Search for a pokemon..." value="{{ $last_search }}">
                    <button type="submit">
                        <h3 class="font-mono font-bold text-center ml-5">Search</h3>
                    </button>
                </form>
            </div>
        </div>
        <div class="mx-auto my-20 flex">
            @foreach($pokemons as $pokemon)
                <div class="bg-gray-200 my-3 mx-3">
                    <form method="GET" action="{{ route('pokemon.show', $pokemon) }}">
                        <button type="submit">
                            <h3 class="font-mono font-bold text-center">{{ $pokemon->name }}</h3>
                            <img src="{{ $pokemon->image_path }}" alt="Image of the pokemon {{ $pokemon->name }}" class="h-40 w-40">
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="mx-auto font-mono my-10 flex">
            <p>{{ $pokemons->links('pagination::simple-tailwind') }}</p>
            <p class="ml-20">{{ $pokemons->currentPage() }} out of {{ $pokemons->lastPage() }}</p>
        </div>
    </div>
</x-layouts.app>