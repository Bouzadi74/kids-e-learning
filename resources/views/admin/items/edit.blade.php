<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.items.update', $item) }}" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="category_id" :value="__('Category')" />
                            <select id="category_id" name="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $item->title)" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $item->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="image" :value="__('Image')" />
                            @if($item->image)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($item->image) }}" alt="Current image" class="h-32 w-32 object-cover">
                                </div>
                            @endif
                            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" accept="image/*" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="audio" :value="__('Audio')" />
                            @if($item->audio)
                                <div class="mt-2">
                                    <audio controls>
                                        <source src="{{ Storage::url($item->audio) }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            @endif
                            <x-text-input id="audio" name="audio" type="file" class="mt-1 block w-full" accept="audio/*" />
                            <x-input-error :messages="$errors->get('audio')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="video" :value="__('Video')" />
                            @if($item->video)
                                <div class="mt-2">
                                    <video controls class="h-48 w-full object-cover">
                                        <source src="{{ Storage::url($item->video) }}" type="video/mp4">
                                        Your browser does not support the video element.
                                    </video>
                                </div>
                            @endif
                            <x-text-input id="video" name="video" type="file" class="mt-1 block w-full" accept="video/*" />
                            <x-input-error :messages="$errors->get('video')" class="mt-2" />
                        </div>

                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="is_featured" class="rounded border-gray-300 text-indigo-600 shadow-sm" {{ $item->is_featured ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-600">{{ __('Featured Item') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <a href="{{ route('admin.items.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>