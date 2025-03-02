<x-layouts.app>
    <div class="flex flex-col">
        <div class="mx-auto py-20">
            <h1 class="font-extrabold font-mono text-7xl text-center">{{ $pokemon->name }}</h1>
            <p class="font-mono text-center mt-8">Species: {{ $pokemon->species }}</p>
            <p class="font-mono text-center mt-8">Height: {{ $pokemon->height }}</p>
            <p class="font-mono text-center mt-8">Weight: {{ $pokemon->weight }}</p>
            <br>
            <br>
            <br>
            <p class="font-mono text-center mt-8">Abilities:</p>
            @foreach ($pokemon->abilities as $ability)
                <br>
                <p class="font-mono text-center mt-8">Name: {{ $ability['name'] }}</p>
                <p class="font-mono text-center mt-8">Is hidden: {{ $ability['is_hidden'] }}</p>
                <p class="font-mono text-center mt-8">Slot: {{ $ability['slot'] }}</p>
                <hr>
                <br>
            @endforeach
        </div>
        <div class="mx-auto mb-10 flex">
            <img src="{{ $pokemon->image_path }}" alt="Image of the pokemon {{ $pokemon->name }}" class="h-60 w-60">
        </div>

        <div class="mx-auto font-mono mb-10">
            <form method="GET" action="{{ route('pokemon.index') }}">
                <button type="submit">
                    <h3 class="font-mono font-bold text-center">Return</h3>
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>