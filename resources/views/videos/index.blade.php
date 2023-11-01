<x-app-layout>
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
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{ route('categories.index', ['id' => $age_id]) }}"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                {{ $category }}
                            </a>

                        </div>
                    </li>
                    @if (isset($subcategory))
                        <li>
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="{{ url()->previous() }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                    {{ $subcategory }}
                                </a>

                            </div>
                        </li>
                    @endif

                </ol>
            </nav>

        </div>
    </div>
    <div class="md:container md:mx-auto px-4 mt-8 max-w-md max-800">
        <div>
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Rechercher</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <form action="{{ route('videos.search', [$subcategory_id, $category_id, $age_id]) }}" method="GET">
                    <input name="search" autocomplete="off"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        @if ($search) value="{{ $search }}"
                    @else
                        placeholder="Rechercher un nom" @endif>
                    <button
                        class="text-white absolute right-2.5 bottom-2.5 bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Rechercher
                    </button>
                </form>
            </div>
        </div>

    </div>
    <div class="flex flex-wrap gap-5 justify-center py-8">
        @if ($videos->isEmpty())
            <div class="flex justify-center py-9">
                <iframe class="w-full aspect-video border-0" width="560" height="315"
                    src="https://player.vimeo.com/video/879944724?autoplay=1"
                    allow="autoplay; fullscreen; picture-in-picture" title="Vidéos à venir" autoplay></iframe>
            </div>
        @else
            @foreach ($videos as $video)
                <div
                    class="max-w-sm bg-white border-2  border-orange-600 border-solid rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @if ($video->type === 'publique' || (auth()->user() && auth()->user()->role === 'ADMIN'))
                        <a
                            href="{{ route('videos.show', ['category_id' => $video->category_id, 'age_id' => $video->age_id, 'video_id' => $video->video_id]) }}">
                            <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $video->vimeo }}.jpg">
                        </a>
                    @else
                        <a href="{{ route('abonnements.index') }}">
                            <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $video->vimeo }}.jpg">
                        </a>
                    @endif
                    <div class="p-5">
                        <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $video->name_video }}</h5>
                        @if ($video->type === 'publique' || (auth()->user() && auth()->user()->role === 'ADMIN'))
                            @if ($video->attachment)
                                <a href="{{ asset('storage/' . $video->attachment) }}"
                                    alt="Télécharger  {{ $video->name_video }}"
                                    title="Télécharger  {{ $video->name_video }}" download>
                                    <div class="flex justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.5 7.5h-.75A2.25 2.25 0 004.5 9.75v7.5a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-7.5a2.25 2.25 0 00-2.25-2.25h-.75m-6 3.75l3 3m0 0l3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 012.25 2.25v7.5a2.25 2.25 0 01-2.25 2.25h-7.5a2.25 2.25 0 01-2.25-2.25v-.75" />
                                        </svg>
                                    </div>
                                </a>
                            @endif

                            {{-- <a href="{{ route('videos.show', ['category_id' => $video->category_id, 'age_id' => $video->age_id, 'video_id' => $video->video_id]) }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-200 rounded-lg hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                <img class="h-8" src="{{ asset('images/sign-language.svg') }}" alt="" />

                            </a> --}}
                        @else
                            <a href="{{ route('abonnements.index') }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-slate-700 rounded-lg hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                Abonnement 1
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>

                            </a>
                        @endif

                    </div>
                </div>
            @endforeach
        @endif
    </div>

</x-app-layout>
