<x-app-layout>
    <div class="flex flex-wrap space-x-4 justify-center py-4">
        <div>
            @foreach ($ages as $age)
                <a href="{{ route('categories.index', $age->id) }}"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <img src="{{ $age->getThumbnailUrl() }}" alt="">
                </a>
        </div>
        @endforeach
    </div>
</x-app-layout>
