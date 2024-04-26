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

                    <a
                        href="{{ route('videos.show', ['category_id' => $video->category_id, 'age_id' => $video->age_id, 'video_id' => $video->video_id]) }}">
                        <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $video->vimeo }}.jpg">
                    </a>

                    <div class="p-5">
                        <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $video->name_video }}</h5>
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
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</x-app-layout>
