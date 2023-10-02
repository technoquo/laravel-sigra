<x-app-layout>
    <div class="flex flex-wrap space-x-4 justify-center py-4">
        <div>

            @foreach ($categories as $categorie)
                <a href="{{ route('videos.index', ['category_id' => $categorie->id, 'age_id' => $id]) }}"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100
                    dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <img src="{{ $categorie->getThumbnailUrl() }}" alt="">
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
