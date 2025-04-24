<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Items') }}
            </h2>
            <a href="{{ route('admin.items.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create New Item
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Title</th>
                                    <th scope="col" class="px-6 py-3">Category</th>
                                    <th scope="col" class="px-6 py-3">Featured</th>
                                    <th scope="col" class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contents as $content)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4">{{ $content->title }}</td>
                                        <td class="px-6 py-4">{{ $content->category->name }}</td>
                                        <td class="px-6 py-4">{{ $content->is_featured ? 'Yes' : 'No' }}</td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('admin.items.destroy', $content) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $contents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>