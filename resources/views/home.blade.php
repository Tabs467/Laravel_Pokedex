<x-layouts.app>
    <div class="flex flex-col">
        <div class="mx-auto py-40">
            <h1 class="font-extrabold font-mono text-7xl">Pokédex</h1>
        </div>
        <div class="mx-auto my-20 flex">
            @foreach($pokemons as $pokemon)
                <div class="bg-gray-200 my-3 mx-3">

                </div>
            @endforeach
        </div>

        <div class="mx-auto font-mono my-10">
            {{ $pokemons->links() }}
        </div>
</x-layouts.app>