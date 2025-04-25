<x-app-layout>
    {{-- Optionnel: Définir un header si besoin --}}
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $category->name }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h1 class="text-3xl font-bold mb-4">{{ $category->name }}</h1>
                    
                    @if($category->description)
                        <p class="text-gray-700 mb-6">{{ $category->description }}</p>
                    @endif

                    <h2 class="text-2xl font-semibold mb-4">Contenus :</h2>

                    @if($category->contents->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($category->contents as $content)
                                <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                                    @if($content->image)
                                        {{-- Assurez-vous que storage:link a été exécuté --}}
                                        <img src="{{ Storage::url($content->image) }}" alt="{{ $content->title }}" class="w-full h-48 object-cover">
                                    @else
                                        {{-- Placeholder si pas d'image --}}
                                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                            <span class="text-gray-500">Pas d'image</span>
                                        </div>
                                    @endif
                                    <div class="p-4">
                                        <h3 class="text-xl font-semibold mb-2">{{ $content->title }}</h3>
                                        @if($content->description)
                                            <p class="text-gray-600 text-sm mb-3">{{ Str::limit($content->description, 100) }}</p>
                                        @endif
                                        {{-- Lien vers la page de détail du contenu --}}
                                        <a href="{{ route('content', ['category_slug' => $category->slug, 'content_slug' => $content->slug]) }}" class="text-blue-500 hover:underline text-sm">Voir plus</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>Aucun contenu trouvé pour cette catégorie.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 