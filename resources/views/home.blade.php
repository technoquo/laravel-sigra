<x-app-layout>
    @section('hero')
        <section class="bienvenue seccion container text-center">
            <h1 class="text-7xl font-semibold mb-4">{{ $title }}</h1>
            {!! str($intro)->markdown() !!}
        </section>
        <section class="mission">
            @foreach ($missions as $mission)
                <div class="objetive">

                    <img src="{{ asset('storage/' . $mission->image) }}" alt="Imagen ">
                    <p class="text-4xl"><a wire:navigate
                            href="{{ route('info.index', ['slug' => $mission->slug]) }}">{{ $mission->title }}</a></p>



                </div>
            @endforeach
        </section>

        <section class="container seccion seccion-instagram">
            <div class="d-flex container just-center instagram">
                @foreach ($instagrams as $instagram)
                    <div>
                        <iframe class="instagram-media instagram-media-rendered" id="instagram-embed-0"
                            src="https://www.instagram.com/p/{{ trim($instagram->instagram) }}/embed/captioned/?cr=1&amp;v=14&amp;wp=326&amp;rd=http%3A%2F%2Flocalhost%3A8000&amp;rp=%2F#%7B%22ci%22%3A0%2C%22os%22%3A2771.800000000745%2C%22ls%22%3A2376.400000002235%2C%22le%22%3A2762.10000000149%7D"
                            allowtransparency="true" allowfullscreen="true" frameborder="0" height="596"
                            data-instgrm-payload-id="instagram-media-payload-0" scrolling="no"
                            style="background: white; max-width: 540px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;"></iframe>
                    </div>
                @endforeach




            </div>
        </section>
    @endsection
</x-app-layout>
