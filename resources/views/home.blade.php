<x-layouts.app>
    <div class="flex flex-col">
        <div class="mx-auto py-40">
            <h1 class="font-extrabold font-mono text-7xl">Pokédex</h1>
        </div>
        <div class="mx-auto my-20 flex">
            @foreach($pokemons as $pokemon)
                <div class="bg-gray-200 my-3 mx-3">
                    <form method="GET" action="{{ route('pokemon.show', $pokemon) }}">
                        <button type="submit">
                            <h3 class="font-mono font-bold text-center">{{ $pokemon->name }}</h3>
                            <img src="{{ asset('images/Poke_Ball.png') }}" alt="Image of the pokemon {{ $pokemon->name }}" class="h-40 w-40">
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