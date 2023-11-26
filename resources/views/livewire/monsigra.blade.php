<div>
    <h1 class="text-center font-bold text-3xl mt-4">Mon Sigra</h1>
    @include('videos.partials.search-box')
    <div class="flex flex-wrap gap-5 justify-center py-8">
        @foreach ($this->monsigra as $video)
            <div class="flex flex-wrap gap-5 justify-center py-8">
                @forelse ($video as $monsigra)
                    <div
                        class="max-w-sm bg-white border-2 border-orange-600 border-solid rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="h-auto w-80 rounded-lg" src="https://vumbnail.com/{{ $monsigra->vimeo }}.jpg">
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $monsigra->name }}</h5>
                            </a>

                            <a href="{{ route('mon.index', ['vimeo' => $monsigra->vimeo]) }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-200 rounded-lg hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                <img class="h-8" src="{{ asset('images/sign-language.svg') }}" alt="" />
                            </a>
                        </div>
                    </div>
                @empty
                    @php
                        $text = 'Aucune vidéo disponible';
                    @endphp
                @endforelse
            </div>
        @endforeach
        @empty($text)
            <p class="text-center text-gray-700 dark:text-white w-2/3">Rejoignez notre communauté dès aujourd'hui et accédez
                à un
                contenu exclusif ! L'abonnement est votre passe pour un monde de vidéos passionnantes. N'hésitez pas à vous
                inscrire et à faire partie de cette expérience unique !</p>
        @else
            <p class="text-center text-gray-700 dark:text-white">{{ $text }}.</p>
        @endempty
    </div>

</div>
