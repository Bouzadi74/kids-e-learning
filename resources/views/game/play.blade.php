<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold">{{ $game->name }}</h1>
                <a href="{{ route('game.index') }}" class="text-blue-500 hover:text-blue-700">
                    ← Back to Games
                </a>
            </div>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @include($gameTypeView)
                </div>
            </div>
        </div>
    </div>
</x-app-layout>