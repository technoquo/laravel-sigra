<div>
    {{-- @include('videos.partials.search-box') --}}


    <div class="md:flex md:flex-row justify-center flex-wrap">

        @foreach ($this->videos->unique('name') as $video)
            @if (Auth::check())
                @if ($video->vimeo != 879944724)
                    <div
                        class="max-w-sm bg-white border-2  border-green-600 border-solid rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-4">


                        <a
                            href="{{ route('videos.show', ['category_id' => 11, 'age_id' => $video->age_id, 'video_id' => $video->id]) }}">
                            <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $video->vimeo }}.jpg">
                        </a>


                        <div class="p-5">
                            <div class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white w-60">
                                {{ $video->name }}</div>

                        </div>


                    </div>
                @endif
            @else
                @if ($video->vimeo != 879944724)
                    @if ($video->type == 'publique')
                        <div
                            class="max-w-sm bg-white border-2  border-green-600 border-solid rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-4">


                            <a
                                href="{{ route('videos.show', ['category_id' => 11, 'age_id' => $video->age_id, 'video_id' => $video->id]) }}">
                                <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $video->vimeo }}.jpg">
                            </a>


                            <div class="p-5">
                                <div class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white w-60">
                                    {{ $video->name }}</div>

                            </div>


                        </div>
                    @endif
                @endif
            @endif
        @endforeach
    </div>
</div>
