<div>

    @if ($this->videos->sortBy('name_video')->first())
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
                                @if ($this->videos->sortBy('name_video')->first()->age)
                                    {{ $this->videos->sortBy('name_video')->first()->age }}
                                @else
                                    12 +
                                @endif
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <div
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                                    {{ $this->videos->sortBy('name_video')->first()->name_video }}</div>
                            </div>
                        </li>

                    </ol>
                </nav>

            </div>
        </div>
    @else
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <h1
                    class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    Le mot <span class="text-red-900">{{ $this->search }}</span> introuvable</h1>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 mt-10">
                    <a href="{{ route('videos.index', ['category_id' => $category_id, 'age_id' => $age_id]) }}"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-sigra hover:bg-slate-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>

                        Retourner


                    </a>
                </div>

            </div>
        </section>
    @endif

    @php
        $video = $this->videos->sortBy('name_video')->first();
    @endphp

    @if ($video && $video->vimeo)
        @include('videos.partials.search-box')
    @endif

    <div class="flex flex-wrap gap-5 justify-center py-8">

        @foreach ($this->videos->sortBy('name_video') as $video)
            @if (!$video->vimeo)
                <div class="px-3 md:mb-6">
                    <a wire:navigate
                        href="{{ route('subcategories.index', ['subcategory_id' => $video->id, 'category_id' => $video->category_id, 'age_id' => $this->age_id]) }}"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <img src="{{ $video->getThumbnailUrl() }}" alt="{{ $video->name }}">
                        <div class="text-center uppercase font-bold dark:text-white">{{ $video->name }}</div>

                    </a>
                </div>
            @else
                <div
                    class="max-w-sm bg-white border-2  border-orange-600 border-solid rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $video->vimeo }}.jpg">
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $video->name_video }}</h5>
                        </a>
                        @if ($video->type === 'publique' || (auth()->user() && auth()->user()->role === 'ADMIN'))
                            <a href="{{ route('videos.show', ['category_id' => $video->category_id, 'age_id' => $video->age_id, 'video_id' => $video->video_id]) }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-200 rounded-lg hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                <img class="h-8" src="{{ asset('images/sign-language.svg') }}" alt="" />

                            </a>
                        @else
                            <a href="#"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-slate-700 rounded-lg hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                Abbonement
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>

                            </a>
                        @endif

                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
