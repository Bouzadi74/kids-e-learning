<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Educational Games</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($games as $game)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold mb-2">{{ $game->name }}</h3>
                                    <p class="text-gray-600 mb-4">{{ $game->description }}</p>
                                    
                                    @if($game->age_group_min && $game->age_group_max)
                                        <p class="text-sm text-gray-500 mb-4">
                                            Recommended Age: {{ $game->age_group_min }}-{{ $game->age_group_max }} years
                                        </p>
                                    @endif
                                    
                                    <a href="{{ $game->website_url }}" 
                                       target="_blank"
                                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
                                        Play Now
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>