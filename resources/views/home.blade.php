<x-layouts.app>
    <div class="flex flex-col items-center w-full">

        <div class="flex flex-col items-center w-full">
            <h1 class="font-extrabold font-mono text-7xl py-10 text-center">Pokédex</h1>
            <div class="w-full max-w-md px-4">
                <form method="GET" action="{{ route('pokemon.search') }}" class="flex items-center w-full">
                    <input class="w-full rounded-md px-3 py-2" id="search_term" name="search_term" placeholder="Search for a Pokémon..." value="{{ $last_search }}">
                    <button type="submit" class="ml-3 px-4 py-2 bg-gray-300 rounded-md">
                        <h3 class="font-mono font-bold text-center">Search</h3>
                    </button>
                </form>
            </div>
        </div>

        <div class="w-full flex flex-wrap justify-center gap-6 my-20">
            @foreach($pokemons as $pokemon)
                <div class="bg-gray-200 p-4 rounded-lg shadow-md flex flex-col items-center w-48">
                    <form method="GET" action="{{ route('pokemon.show', $pokemon) }}" class="w-full">
                        <button type="submit" class="flex flex-col items-center w-full">
                            <h3 class="font-mono font-bold text-center">{{ $pokemon->name }}</h3>
                            <img src="{{ $pokemon->image_path }}" alt="Image of {{ $pokemon->name }}" class="h-40 w-40">
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="flex flex-col items-center gap-2">
            <div class="flex justify-center gap-4">
                @if (!$pokemons->onFirstPage())
                    <a href="{{ $pokemons->previousPageUrl() }}" class="w-24 py-2 text-center bg-gray-300 rounded-md">
                        Previous
                    </a>
                @endif
                @if (!$pokemons->onLastPage())
                    <a href="{{ $pokemons->nextPageUrl() }}" class="w-24 py-2 text-center bg-gray-300 rounded-md">
                        Next
                    </a>
                @endif
            </div>
            <p class="mt-2 font-mono text-sm">
                {{ $pokemons->currentPage() }} out of {{ $pokemons->lastPage() }}
            </p>
        </div>
    </div>
</x-layouts.app>