<x-app-layout>

    <div class="text-center uppercase py-4">
        <h1 class="text-center font-bold text-3xl mt-4">Nos abonnements</h1>
    </div>
    <iframe class="mx-auto w-full lg:max-w-xl h-64 rounded-lg sm:h-96 shadow-xl"
        src="https://player.vimeo.com/video/452867112" title="Vimeo video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
    <div class="md:flex justify-center py-4">
        @foreach ($abonnements as $abonnement)
            <div
                class="w-full md:w-1/3 max-w-sm mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700 md:mx-6 m-10">
                <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">{{ $abonnement->title }}</h5>
                <div class="flex items-baseline text-gray-900 dark:text-white">
                    <span class="text-3xl font-semibold">€</span>
                    <span class="text-5xl font-extrabold tracking-tight">{{ $abonnement->price }}</span>
                    <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">/
                        @php
                            $option = $abonnement->time;
                        @endphp

                        @if ($option == 1)
                            année
                        @elseif($option == 2)
                            mois
                        @else
                            vidéo
                        @endif
                    </span>
                </div>
                <ul role="list" class="space-y-5 my-7">
                    <li class="flex space-x-3 items-center">
                        <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span
                            class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">{{ $abonnement->qty }}
                            @if ($abonnement->qty >= 1)
                                vidéos
                            @else
                                vidéo
                            @endif
                        </span>
                    </li>

                </ul>
                <a href="{{ $abonnement->url }}" target="_blank"
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Je
                    m‘abonne</a>
            </div>
        @endforeach

    </div>
</x-app-layout>
