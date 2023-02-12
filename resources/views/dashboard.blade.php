<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 m-6">
        <div class="w-full sm:px-6 lg:px-8 mb-4">
            @can('write post')
                <a href="{{ route('posts.create') }}" class="p-2 bg-green-400 rounded-lg">
                    Create
                </a>
            @endcan
        </div>
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Id</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Title</th>
                        <th scope="col" class="relative px-6 py-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200">

                    @foreach (App\Models\Post::all() as $post)
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $post->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $post->title}}</td>
                        <td class="px-6 py-4 text-right text-sm">
                            @can('edit post')
                                <a href="{{ route('posts.edit', $post->id) }}" class="m-2 p-2 bg-green-400 rounded">Edit</a>
                            @endcan
                            @can('publish post')                        
                                <a href="#" class="m-2 p-2 bg-green-400 rounded">Publish</a>
                            @endcan
                        </td>
                    </tr> 
                    @endforeach
                
                    </tbody>
                </table>
            <div class="m-2 p-2">Pagination</div>
            </div>
        </div>
    </div>
</x-app-layout>
