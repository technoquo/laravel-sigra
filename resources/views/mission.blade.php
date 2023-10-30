<x-app-layout>
    <main class="container seccion info">
        <div class="md:flex flex-row">
            <div class="basis-3/5">
                {!! str($mission->description)->markdown() !!}
            </div>
            <div class=" basis-1/2">


                @if ($mission->image2)
                    <figure class="max-w-lg">
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $mission->image2) }}"
                            alt="{{ $mission->title }}">
                        <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">
                            {{ $mission->title }}</figcaption>
                    </figure>
                @endif

            </div>
        </div>
    </main>
</x-app-layout>
