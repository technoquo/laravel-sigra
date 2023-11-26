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
        <div class="md:flex md:flex-row justify-center flex-wrap">

            @if ($categories)
                @foreach ($categories as $category)
                    <div class="px-5 py-8">
                        @if ($category['id'] === 10)
                            <a href="https://www.lsfb.be/thisisnotmagic/frances/frances.php" target="_blank">
                            @else
                                <a
                                    href="{{ route('videos.index', ['category_id' => $category['id'], 'age_id' => $age_id]) }}">
                        @endif
                        <img src="{{ asset('storage/' . $category['image']) }}" class="fixed-size-image" alt="">
                        <div class="text-center uppercase font-bold dark:text-white">{{ $category['name'] }}
                        </div>
                        </a>
                    </div>
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

</x-app-layout>
