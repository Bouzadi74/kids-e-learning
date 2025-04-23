<x-app-layout>
    <div class="bg-gradient-to-b from-blue-100 to-purple-100 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-12">Explore Learning Categories</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($categories as $category)
                    <a href="{{ route('category', $category) }}" class="block">
                        <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform transition duration-300 hover:scale-105">
                            @if($category->image)
                                <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-full h-48 object-cover">
                            @endif
                            <div class="p-6">
                                <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $category->name }}</h2>
                                @if($category->description)
                                    <p class="text-gray-600 mb-4">{{ Str::limit($category->description, 100) }}</p>
                                @endif
                                <div class="inline-flex items-center text-blue-500">
                                    <span class="font-semibold">Start Learning</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-app-layout>