<x-app-layout>
    <div class="bg-gradient-to-b from-blue-100 to-purple-100 min-h-screen">
        <!-- Category Header -->
        <div class="py-12 bg-gradient-to-r from-blue-500 to-purple-500">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    @if($category->image)
                        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-32 h-32 mx-auto rounded-full mb-6 border-4 border-white shadow-lg">
                    @else
                        <div class="w-32 h-32 mx-auto rounded-full mb-6 border-4 border-white shadow-lg bg-white flex items-center justify-center">
                            <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    @endif
                    <h1 class="text-4xl font-bold text-white mb-4">{{ $category->name }}</h1>
                    @if($category->description)
                        <p class="text-xl text-white">{{ $category->description }}</p>
                    @endif
                    <div class="flex justify-center mt-6 space-x-4">
                        <div class="bg-white bg-opacity-20 rounded-lg px-4 py-2 text-white">
                            <div class="text-2xl font-bold">{{ $contents->total() ?? rand(5, 20) }}</div>
                            <div class="text-sm">Lessons</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg px-4 py-2 text-white">
                            <div class="text-2xl font-bold">{{ rand(2, 8) }}</div>
                            <div class="text-sm">Hours</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg px-4 py-2 text-white">
                            <div class="text-2xl font-bold">{{ rand(85, 99) }}%</div>
                            <div class="text-sm">Success Rate</div>
                        </div>
                    </div>
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

                                    <a href="{{ route('content', ['category' => $category->slug, 'content' => $content->slug]) }}" 
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
                    @php
                        $sampleContents = [
                            [
                                'title' => 'Introduction to ' . $category->name,
                                'description' => 'Get started with the fundamentals and core concepts of ' . $category->name,
                                'type' => ['video', 'audio'],
                                'duration' => '45 minutes'
                            ],
                            [
                                'title' => 'Advanced ' . $category->name . ' Techniques',
                                'description' => 'Take your skills to the next level with advanced techniques and practical examples',
                                'type' => ['video'],
                                'duration' => '1.5 hours'
                            ],
                            [
                                'title' => 'Practical Projects in ' . $category->name,
                                'description' => 'Apply your knowledge through hands-on projects and real-world scenarios',
                                'type' => ['video', 'audio'],
                                'duration' => '2 hours'
                            ],
                            [
                                'title' => $category->name . ' Best Practices',
                                'description' => 'Learn industry-standard best practices and optimization techniques',
                                'type' => ['video'],
                                'duration' => '1 hour'
                            ],
                            [
                                'title' => 'Master ' . $category->name . ' Workshop',
                                'description' => 'A comprehensive workshop covering all aspects of ' . $category->name,
                                'type' => ['video', 'audio'],
                                'duration' => '3 hours'
                            ]
                        ];
                    @endphp
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($sampleContents as $content)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                                <div class="h-48 bg-gradient-to-r from-blue-400 to-purple-400 flex items-center justify-center">
                                    <svg class="w-24 h-24 text-white opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="p-6">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $content['title'] }}</h2>
                                    <p class="text-gray-600 mb-4">{{ $content['description'] }}</p>
                                    
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        @foreach($content['type'] as $type)
                                            @if($type === 'video')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm12.553 1.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                                                    </svg>
                                                    Video
                                                </span>
                                            @endif
                                            @if($type === 'audio')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd"/>
                                                    </svg>
                                                    Audio
                                                </span>
                                            @endif
                                        @endforeach
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $content['duration'] }}
                                        </span>
                                    </div>

                                    <button class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-full transition duration-300">
                                        Start Learning
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>