<x-app-layout>
    <div class="bg-gradient-to-b from-blue-100 to-purple-100 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-gray-600">
                    <li>
                        <a href="{{ route('categories') }}" class="hover:text-blue-500">Categories</a>
                    </li>
                    <li>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </li>
                    <li>
                        <a href="{{ route('categories.show', $category->slug) }}" class="hover:text-blue-500">{{ $category->name }}</a>
                    </li>
                    <li>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </li>
                    <li>{{ $content->title }}</li>
                </ol>
            </nav>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Content Header -->
                <div class="p-8 bg-gradient-to-r from-blue-500 to-purple-500">
                    <h1 class="text-4xl font-bold text-white mb-4">{{ $content->title }}</h1>
                    @if($content->description)
                        <p class="text-xl text-white">{{ $content->description }}</p>
                    @endif
                </div>

                <!-- Content Body -->
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Image Column -->
                        <div class="md:col-span-1">
                            @if($content->image)
                                <div class="mb-8 md:mb-0">
                                    <img src="{{ Storage::url($content->image) }}" alt="{{ $content->title }}"
                                         class="w-full h-auto object-cover rounded-xl shadow-lg border-4 border-yellow-300 transform hover:scale-105 transition duration-300">
                                </div>
                            @endif
                        </div>

                        <!-- Content Column -->
                        <div class="md:col-span-2">
                            <!-- Video Content -->
                            @if($content->video)
                                <div class="mb-8">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Watch and Learn</h2>
                                    <div class="aspect-w-16 aspect-h-9">
                                        <video class="w-full rounded-xl" controls>
                                            <source src="{{ Storage::url($content->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            @endif

                            <!-- Audio Content -->
                            @if($content->audio)
                                <div class="mb-8">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Listen and Learn</h2>
                                    <div class="bg-gray-100 p-4 rounded-xl">
                                        <audio class="w-full" controls>
                                            <source src="{{ Storage::url($content->audio) }}" type="audio/mpeg">
                                            Your browser does not support the audio tag.
                                        </audio>
                                    </div>
                                </div>
                            @endif

                            <!-- Website Link -->
                            @if($content->website_url)
                                <div class="mt-8 pt-8 border-t border-gray-200">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Ressource externe</h2>
                                    <a href="{{ $content->website_url }}" target="_blank" rel="noopener noreferrer"
                                       class="inline-flex items-center px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-bold rounded-full transition duration-300 shadow-md hover:scale-105">
                                        Visiter le site
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="p-8 bg-gray-50 border-t">
                    <div class="flex justify-between">
                        <a href="{{ route('categories.show', $category->slug) }}" 
                           class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-bold rounded-full transition duration-300">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                            </svg>
                            Back to {{ $category->name }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>