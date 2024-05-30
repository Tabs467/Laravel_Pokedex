<x-layouts.app>
    <div class="flex flex-col">
        <div class="mx-auto py-40">
            <h1 class="font-extrabold font-mono text-7xl">Pokédex</h1>
        </div>
        <div class="mx-auto my-20 flex">
            @foreach($pokemons as $pokemon)
                <div class="bg-gray-200 my-3 mx-3">
                    <h3 class="font-mono font-bold text-center">{{ $pokemon->name }}</h3>
                    <img src="{{ asset('images/Poke_Ball.png') }}" alt="Image of the pokemon {{ $pokemon->name }}" class="h-40 w-40">
                </div>
            @endforeach
        </div>

        <div class="mx-auto font-mono my-10">
            {{ $pokemons->links() }}
        </div>
</x-layouts.app>