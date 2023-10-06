<div class="flex justify-center">

    <div class="grid grid-cols-2 gap-2">
        @foreach ($this->ages as $age)
            <div class="px-5 py-8">
                <a wire:navigate href="{{ route('categories.index', ['id' => $age->id]) }}"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <img src="{{ $age->getThumbnailUrl() }}" alt="">
                </a>
            </div>
        @endforeach
    </div>
</div>
