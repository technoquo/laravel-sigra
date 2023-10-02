<x-app-layout>


    {{-- <div class="flex flex-wrap justify-center py-4 px-8 mx-auto">

        @foreach ($videos as $video)
            <div>
                <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $video->vimeo }}.jpg"
                    alt="{{ $video->name }}" />
                <iframe width="100%" height="200" src="https://player.vimeo.com/video/{{ $video->vimeo }}"
                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe> 
                nombre: {{ $video->type }}
            </div>
        @endforeach


    </div> --}}
    <div class="flex flex-wrap justify-center py-4 px-8 mx-auto">

        @foreach ($videos as $video)
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $video->vimeo }}.jpg">
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $video->name_video }}</h5>
                    </a>                    
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        {{ $video->type }}
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
