<x-app-layout>
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/modal-video.min.css') }}">
    @endsection


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
    <div class="flex flex-wrap gap-5 justify-center py-8">

        @foreach ($videos->sortBy('name_video') as $video)
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
                    @if ($video->type === 'publique')
                        <a class="js-modal-btn inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-200 rounded-lg hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800"
                            data-video-id="{{ $video->vimeo }}">
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
        @endforeach
    </div>
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/modal/jquery-modal-video.min.js') }}"></script>
        <script>
            $(".js-modal-btn").modalVideo({
                channel: 'vimeo'
            });
        </script>
    @endsection
</x-app-layout>
