<x-layouts.app>
    <div class="flex flex-col">
        <div class="mx-auto py-20">
            <h1 class="font-extrabold font-mono text-7xl text-center">{{ $pokemon->name }}</h1>

            <div class="flex center-x-y">
                <img src="{{ $pokemon->image_path }}" alt="Image of the pokemon {{ $pokemon->name }}" class="h-60 w-60">
                <div class="flex flex-col center-x-y">
                    <p class="font-mono">Species: {{ $pokemon->species }}</p>
                    <p class="font-mono">Height: {{ $pokemon->height }}</p>
                    <p class="font-mono">Weight: {{ $pokemon->weight }}</p>
                </div>
            </div>

            <p class="font-mono text-center mt-8 font-bold">Abilities:</p>
            <div class="flex justify-center mt-4 space-x-4">
                @foreach ($pokemon->abilities as $ability)
                    <div class="flex flex-col justify-center items-center w-40 h-32 border border-gray-300 rounded-lg p-4">
                        <p class="font-mono text-center font-bold">{{ $ability['name'] }}</p>
                        <p class="font-mono text-center">{{ $ability['is_hidden'] }}</p>
                        <p class="font-mono text-center">Slot {{ $ability['slot'] }}</p>
                    </div>
                @endforeach
            </div>

        </div>

        <div class="mx-auto font-mono mb-10">
            <form method="GET" action="{{ route('pokemon.index') }}">
                <input type="hidden" name="page" value="{{ $searchPage }}">
                <input type="hidden" name="searchTerm" value="{{ $searchTerm }}">
                <button type="submit">
                    <h3 class="font-mono font-bold text-center">Return</h3>
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>