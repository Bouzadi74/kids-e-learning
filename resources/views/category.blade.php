<x-app-layout>
    <div class="bg-gradient-to-b from-blue-100 to-purple-100 min-h-screen">
        <!-- Category Header -->
        <div class="py-12 bg-gradient-to-r from-blue-500 to-purple-500">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    @if($category->image)
                        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-32 h-32 mx-auto rounded-full mb-6 border-4 border-white shadow-lg">
                    @endif
                    <h1 class="text-4xl font-bold text-white mb-4">{{ $category->name }}</h1>
                    @if($category->description)
                        <p class="text-xl text-white">{{ $category->description }}</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @if($contents->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($contents as $content)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                                @if($content->image)
                                    <img src="{{ Storage::url($content->image) }}" alt="{{ $content->title }}" class="w-full h-48 object-cover">
                                @endif
                                <div class="p-6">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $content->title }}</h2>
                                    <p class="text-gray-600 mb-4">{{ Str::limit($content->description, 100) }}</p>
                                    
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        @if($content->video)
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm12.553 1.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                                                </svg>
                                                Video
                                            </span>
                                        @endif
                                        @if($content->audio)
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd"/>
                                                </svg>
                                                Audio
                                            </span>
                                        @endif
                                    </div>

                                    <a href="{{ route('content', ['category' => $category, 'content' => $content]) }}" 
                                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-full transition duration-300">
                                        Start Learning
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8">
                        {{ $contents->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <h3 class="text-2xl font-semibold text-gray-600">No learning materials available yet!</h3>
                        <p class="text-gray-500 mt-2">Please check back later for new content.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>