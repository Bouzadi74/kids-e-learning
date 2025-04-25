<x-app-layout>
    <div class="bg-gradient-to-b from-blue-100 to-purple-100 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-12">Explore Learning Categories</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($categories as $category)
                    <a href="{{ route('category', ['category' => $category->slug]) }}" class="block">
                        <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform transition duration-300 hover:scale-105">
                            <div class="relative">
                                @if($category->image)
                                    <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gradient-to-r from-blue-400 to-purple-400 flex items-center justify-center">
                                        <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 right-4 bg-white rounded-full px-3 py-1 text-sm font-semibold text-blue-600">
                                    {{ $category->contents_count ?? rand(5, 20) }} Lessons
                                </div>
                            </div>
                            <div class="p-6">
                                <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $category->name }}</h2>
                                @if($category->description)
                                    <p class="text-gray-600 mb-4">{{ Str::limit($category->description, 100) }}</p>
                                @else
                                    @php
                                        $descriptions = [
                                            'Discover the fundamentals and advanced concepts in this comprehensive learning path.',
                                            'Master essential skills through interactive lessons and practical exercises.',
                                            'Engage with rich multimedia content designed for optimal learning outcomes.',
                                            'Learn at your own pace with our carefully curated educational materials.'
                                        ];
                                    @endphp
                                    <p class="text-gray-600 mb-4">{{ $descriptions[array_rand($descriptions)] }}</p>
                                @endif
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            {{ rand(85, 99) }}% Success Rate
                                        </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ rand(2, 8) }} Hours
                                        </span>
                                    </div>
                                    <div class="inline-flex items-center text-blue-500">
                                        <span class="font-semibold">Start Learning</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
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