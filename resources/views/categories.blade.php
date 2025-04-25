<x-app-layout>
    <div class="bg-gradient-to-b from-blue-100 to-purple-100 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-12">All Categories</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($categories as $category)
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                        <a href="{{ route('category', $category->slug) }}" class="block transform transition duration-300 hover:scale-105">
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
                            </div>
                            <div class="p-6">
                                <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $category->name }}</h2>
                                <p class="text-gray-600 mb-4">{{ Str::limit($category->description, 100) }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $category->contents->count() }} Content{{ $category->contents->count() == 1 ? '' : 's' }}
                                    </span>
                                </div>
                            </div>
                        </a>
                        @if($category->contents->count())
                        <div class="px-6 pb-6">
                            <ul class="space-y-2 mt-2">
                                @foreach($category->contents as $content)
                                    <li class="bg-gray-50 rounded-lg p-3 shadow flex items-center justify-between hover:bg-blue-50 transition">
                                        <div>
                                            <a href="{{ route('content', [$category->slug, $content->slug]) }}" class="font-semibold text-blue-700 hover:underline">{{ $content->title }}</a>
                                            <div class="text-xs text-gray-500">{{ Str::limit($content->description, 60) }}</div>
                                        </div>
                                        @if($content->image)
                                            <img src="{{ Storage::url($content->image) }}" alt="{{ $content->title }}" class="w-12 h-12 object-cover rounded-md ml-4">
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>