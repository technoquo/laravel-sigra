<x-app-layout>
    <div>
        <div class="grid grid-cols-6 gap-4">
            <div class="col-end-7 col-span-2 web-hidden">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('ages.index') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                {{ $age }}
                            </a>
                        </li>
                    </ol>
                </nav>

            </div>
        </div>
        <div class="flex flex-wrap space-x-4 justify-center py-4">
            <div>

                @if ($categories)
                    @foreach ($categories as $categorie)
                        <a wire:navigate
                            href="{{ route('videos.index', ['category_id' => $categorie->id, 'age_id' => $age_id]) }}"
                            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100
                        dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <img src="{{ $categorie->getThumbnailUrl() }}" alt="">
                        </a>
                    @endforeach
                @else
                    <section class="bg-white dark:bg-gray-900">
                        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                            <h1
                                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                                La page est introuvable</h1>

                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
