<div class="flex justify-center">

    <div class="md:flex md:flex-row justify-center flex-wrap">
        @foreach ($this->ages as $age)
            <div class="px-5 py-8">
                <a wire:navigate href="{{ route('categories.index', ['id' => $age->id]) }}" class="max-w-sm p-6">
                    <img class="fixed-size-image" src="{{ $age->getThumbnailUrl() }}" alt="">
                </a>
            </div>
        @endforeach
    </div>
</div>
