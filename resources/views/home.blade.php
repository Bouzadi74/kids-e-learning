<x-app-layout>
    <div class="bg-gradient-to-b from-blue-100 to-purple-100 min-h-screen">
        <!-- Hero Section -->
        <div class="py-12 bg-gradient-to-r from-blue-500 to-purple-500">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-white mb-4">Welcome to Kids Learning Adventure!</h1>
                    <p class="text-xl text-white">Discover fun and exciting ways to learn new things!</p>
                </div>
            </div>
        </div>

        <!-- Featured Content Section -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Featured Learning Materials</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($featuredContents as $content)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                            @if($content->image)
                                <img src="{{ Storage::url($content->image) }}" alt="{{ $content->title }}" class="w-full h-48 object-cover">
                            @endif
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $content->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($content->description, 100) }}</p>
                                <a href="{{ route('content', ['category' => $content->category, 'content' => $content]) }}" 
                                   class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-300">
                                    Start Learning
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Categories Section -->
        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Learning Categories</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($categories as $category)
                        <a href="{{ route('category', $category) }}" class="block">
                            <div class="bg-gradient-to-br from-{{ ['pink', 'blue', 'green', 'yellow'][random_int(0, 3)] }}-400 to-{{ ['purple', 'indigo', 'teal', 'orange'][random_int(0, 3)] }}-500 rounded-lg shadow-lg p-6 text-center transform transition duration-300 hover:scale-105">
                                @if($category->image)
                                    <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-20 h-20 mx-auto mb-4 rounded-full">
                                @endif
                                <h3 class="text-xl font-bold text-white">{{ $category->name }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="text-center mt-8">
                    <a href="{{ route('categories') }}" class="inline-block bg-purple-500 hover:bg-purple-600 text-white font-bold py-3 px-6 rounded-full transition duration-300">
                        Explore All Categories
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
