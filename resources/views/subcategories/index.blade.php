<x-app-layout>
    <div class="flex flex-wrap justify-center py-4 px-8">
        @foreach ($subcategories as $subcategory)
            <div class="px-3 md:mb-6">
                <a href="{{ route('subcategories.index', ['subcategory_id' => $subcategory->id, 'category_id' => $subcategory->category_id, 'age_id' => $id]) }}"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <img src="{{ $subcategory->getThumbnailUrl() }}" alt="">
                </a>
            </div>
        @endforeach
    </div>
</x-app-layout>
