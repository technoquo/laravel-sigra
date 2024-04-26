<div class="flex flex-row justify-center  py-8">
    @foreach ($results as $result)
        <div
            class="max-w-sm bg-white border-2 border-green-600 border-solid rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 m-4 order-1">
            <a
                href="{{ route('videos.show', ['category_id' => $result->category_id, 'age_id' => $result->age_id, 'video_id' => $result->video_id]) }}">
                <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $result->vimeo }}.jpg">
            </a>
            <div class="p-5">
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">{{ $result->name_video }}
                </h5>
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 order-2">
            <a href="{{ route('ages.index') }}"
                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-sigra hover:bg-slate-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Retourner
            </a>
        </div>
    </div>
</div>
