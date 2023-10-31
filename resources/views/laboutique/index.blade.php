<x-app-layout>
    <div class="text-center  py-4">
        <h1 class="text-center font-bold text-3xl mt-4">La Boutique</h1>
    </div>
    <div class="md:flex justify-center py-4">
        @foreach ($boutiques as $boutique)
            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ $boutique->getThumbnailUrl() }}" alt="{{ $boutique->title }}" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $boutique->title }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-3xl">
                        <span class="font-semibold">€</span>
                        {{ $boutique->price }}
                    </p>
                    <a href="{{ $boutique->url }}" target="_blank"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Je veux acheter !

                    </a>
                </div>
            </div>
        @endforeach

    </div>




</x-app-layout>
