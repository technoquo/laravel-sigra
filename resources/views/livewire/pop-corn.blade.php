<div>
    {{-- @include('videos.partials.search-box') --}}


    <div class="md:flex md:flex-row justify-center flex-wrap">

        @foreach ($this->videos->unique('name') as $video)
            @if ($video->vimeo != 879944724)
                <div
                    class="max-w-sm bg-white border-2  border-green-600 border-solid rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-4">

                    {{-- @if ($video->type === 'publique' || $video->type === 'private' || (auth()->user() && auth()->user()->role === 'ADMIN')) --}}
                        <a
                            href="{{ route('videos.show', ['category_id' => 11, 'age_id' => $video->age_id, 'video_id' => $video->id]) }}">
                            <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $video->vimeo }}.jpg">
                        </a>
                    {{-- @else
                        <a href="{{ route('abonnements.index') }}">
                            <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $video->vimeo }}.jpg">
                        </a>
                    @endif --}}

                    <div class="p-5">
                        <div class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white w-60">
                            {{ $video->name }}</div>
                        {{-- @if ($video->type === 'publique' || $video->type === 'private' || (auth()->user() && auth()->user()->role === 'ADMIN'))
                        @else
                            <a href="{{ route('abonnements.index') }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-slate-700 rounded-lg hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                Abonnement
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>

                            </a>
                        @endif --}}
                    </div>


                </div>
            @endif
        @endforeach
    </div>
</div>
