<x-app-layout>
    <div class="bg-gradient-to-b from-pink-100 via-yellow-100 to-blue-100 min-h-screen">
        <!-- Hero Section (with cartoon image) -->
        <div class="py-16 bg-gradient-to-r from-pink-400 via-yellow-300 to-blue-400 relative overflow-hidden">
            <div class="absolute left-0 top-0 w-40 h-40 bg-pink-200 rounded-full opacity-60 blur-2xl animate-bounce-slow"></div>
            <div class="absolute right-0 bottom-0 w-40 h-40 bg-blue-200 rounded-full opacity-60 blur-2xl animate-bounce-slow"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-center gap-8">
                <div class="flex-1 text-center md:text-left">
                    <h1 class="text-5xl font-extrabold text-white mb-6 font-comic drop-shadow-lg tracking-wide animate-bounce">Bienvenue dans l'Aventure d'Apprentissage des Enfants !</h1>
                    <p class="text-2xl text-white mb-8 font-comic drop-shadow-md">Découvre des façons <span class="text-yellow-200 font-bold">amusantes</span> et <span class="text-pink-200 font-bold">magiques</span> d'apprendre !</p>
                    <a href="#categories" class="inline-block bg-yellow-300 text-pink-700 font-extrabold py-3 px-10 rounded-full shadow-lg transition duration-300 hover:bg-yellow-400 hover:scale-110 animate-wiggle">
                        Commencer l'Exploration
                    </a>
                </div>
                <div class="flex-1 flex justify-center">
                    <img src="/logo.png" alt="Kids Cartoon Logo" class="w-72 h-72 object-contain drop-shadow-2xl rounded-full border-8 border-white bg-yellow-100 animate-pop" />
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center p-8 bg-pink-100 rounded-3xl border-4 border-pink-200 shadow-xl">
                        <div class="text-5xl font-extrabold text-pink-500 mb-2 animate-bounce">{{ $categories->count() }}</div>
                        <div class="text-lg text-pink-700 font-comic">Catégories d'Apprentissage</div>
                    </div>
                    <div class="text-center p-8 bg-yellow-100 rounded-3xl border-4 border-yellow-200 shadow-xl">
                        <div class="text-5xl font-extrabold text-yellow-500 mb-2 animate-bounce">{{ $totalContents }}</div>
                        <div class="text-lg text-yellow-700 font-comic">Contenus Éducatifs</div>
                    </div>
                    <div class="text-center p-8 bg-blue-100 rounded-3xl border-4 border-blue-200 shadow-xl">
                        <div class="text-5xl font-extrabold text-blue-500 mb-2 animate-bounce">{{ $activeUsers }}</div>
                        <div class="text-lg text-blue-700 font-comic">Enfants Actifs</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Content Section -->
        <div class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-4xl font-extrabold text-center text-pink-500 mb-12 font-comic drop-shadow-lg">Contenus Mis en Avant</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($featuredContents as $content)
                        <div class="bg-white rounded-3xl border-4 border-yellow-200 shadow-xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl animate-pop">
                            @if($content->image)
                                <img src="{{ Storage::url($content->image) }}" alt="{{ $content->title }}" class="w-full h-48 object-cover rounded-t-3xl">
                            @endif
                            <div class="p-6">
                                <h3 class="text-2xl font-extrabold text-pink-600 mb-2 font-comic">{{ $content->title }}</h3>
                                <p class="text-gray-600 mb-4 font-comic">{{ Str::limit($content->description, 100) }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-yellow-600 font-comic">{{ $content->category->name }}</span>
                                    <a href="{{ route('content', ['category' => $content->category, 'content' => $content]) }}" 
                                       class="inline-flex items-center bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full transition duration-300 shadow-md hover:scale-110">
                                        Commencer
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Categories Section -->
        <div class="py-16 bg-white" id="categories">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-4xl font-extrabold text-center text-yellow-500 mb-12 font-comic drop-shadow-lg">Catégories d'Apprentissage</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                    @foreach($categories as $category)
                        <a href="{{ route('categories.show', $category->slug) }}" class="block">
                            <div class="bg-gradient-to-br from-{{ ['pink', 'blue', 'green', 'yellow'][$loop->index % 4] }}-300 to-{{ ['purple', 'indigo', 'teal', 'orange'][$loop->index % 4] }}-400 rounded-3xl border-4 border-white shadow-xl p-8 text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl animate-pop relative">
                                @if($category->image)
                                    <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-24 h-24 mx-auto mb-4 rounded-full border-4 border-yellow-200 bg-white">
                                @else
                                    <img src="https://cdn.pixabay.com/photo/2023/02/17/15/23/ai-generated-7796260_1280.jpg" alt="Cartoon Kids" class="w-24 h-24 mx-auto mb-4 rounded-full border-4 border-yellow-200 bg-white">
                                @endif
                                <h3 class="text-2xl font-extrabold mb-2 font-comic drop-shadow 
                                    {{ ['text-pink-700','text-blue-700','text-green-700','text-yellow-700'][$loop->index % 4] }}
                                ">{{ $category->name }}</h3>
                                @if($category->description)
                                    <p class="font-comic 
                                        {{ ['text-pink-900','text-blue-900','text-green-900','text-yellow-900'][$loop->index % 4] }}
                                    ">{{ Str::limit($category->description, 60) }}</p>
                                @endif
                                <img src="/logo.png" alt="Cartoon Decoration" class="absolute -bottom-8 right-2 w-16 h-16 opacity-70 hidden md:block" />
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="text-center mt-12">
                    <a href="{{ route('categories') }}" class="inline-flex items-center bg-pink-400 hover:bg-pink-500 text-white font-extrabold py-3 px-10 rounded-full shadow-lg transition duration-300 hover:scale-110 animate-wiggle">
                        Explorer Toutes les Catégories
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Testimonials Section -->
        <div class="py-16 bg-gradient-to-r from-yellow-100 via-pink-100 to-blue-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-4xl font-extrabold text-center text-blue-400 mb-12 font-comic drop-shadow-lg">Ce que disent les parents</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="bg-white rounded-3xl border-4 border-pink-200 shadow-xl p-8 animate-pop">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-pink-100 flex items-center justify-center border-4 border-pink-200">
                                <svg class="w-8 h-8 text-pink-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-pink-600 font-comic">Marie D.</h4>
                                <p class="text-sm text-gray-500 font-comic">Mère de deux enfants</p>
                            </div>
                        </div>
                        <p class="text-gray-600 font-comic">"Mes enfants adorent apprendre avec cette plateforme. Les contenus sont adaptés à leur âge et très engageants."</p>
                    </div>
                    <div class="bg-white rounded-3xl border-4 border-yellow-200 shadow-xl p-8 animate-pop">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-yellow-100 flex items-center justify-center border-4 border-yellow-200">
                                <svg class="w-8 h-8 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-yellow-600 font-comic">Jean P.</h4>
                                <p class="text-sm text-gray-500 font-comic">Père d'un enfant</p>
                            </div>
                        </div>
                        <p class="text-gray-600 font-comic">"Une excellente ressource éducative. Les vidéos et les activités interactives rendent l'apprentissage amusant."</p>
                    </div>
                    <div class="bg-white rounded-3xl border-4 border-blue-200 shadow-xl p-8 animate-pop">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center border-4 border-blue-200">
                                <svg class="w-8 h-8 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="font-bold text-blue-600 font-comic">Sophie L.</h4>
                                <p class="text-sm text-gray-500 font-comic">Éducatrice</p>
                            </div>
                        </div>
                        <p class="text-gray-600 font-comic">"Je recommande cette plateforme à tous les parents. C'est un excellent complément à l'éducation traditionnelle."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
@keyframes wiggle {
  0%, 100% { transform: rotate(-3deg); }
  50% { transform: rotate(3deg); }
}
.animate-wiggle { animation: wiggle 1s infinite; }
@keyframes pop {
  0% { transform: scale(0.95); }
  50% { transform: scale(1.05); }
  100% { transform: scale(1); }
}
.animate-pop { animation: pop 0.8s ease; }
@keyframes bounce-slow {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-20px); }
}
.animate-bounce-slow { animation: bounce-slow 3s infinite; }
</style>
