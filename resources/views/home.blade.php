<x-app-layout>
    @section('hero')
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
                <div class="flex flex-col justify-center">
                    <h1
                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                        Bienvenue sur notre site</h1>
                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">A promouvoir l’accès des
                        enfants et des jeunes à l’information et à la culture mais aussi à la littérature,à la santé,aux
                        loisirs, etc.
                        Grâce à la LSFB.</p>
                </div>
                <div>
                    <iframe class="mx-auto w-full lg:max-w-xl h-64 rounded-lg sm:h-96 shadow-xl"
                        src="https://player.vimeo.com/video/556090347" title="Vimeo video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </section>
        <section class="bg-white dark:bg-gray-900">
            <div
                class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
                <iframe class="mx-auto w-full lg:max-w-xl h-64 rounded-lg sm:h-96 shadow-xl"
                    src="https://player.vimeo.com/video/556090347" title="Vimeo video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="mt-4 md:mt-0">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                        SIGRA</h2>
                    <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">produit des ressources
                        pédagogiques et culturelles en Langue des Signes Francophone Belge (LSFB) pour les enfants et jeunes
                        sourds. Grâce aux compétences pédagogiques et linguistiques de nos bénévoles, nous proposons un
                        large éventail de ressources, sous forme digitale ou en présentiel, telles que des contes, des
                        histoires, des fables, des récits, des classiques de la littérature, des outils pédagogiques, des
                        formations. Nous nous adressons aux enfants et jeunes sourds, mais nos réalisations peuvent être
                        bénéfiques pour les enfants entendants de parents sourds (CODA) et toute personne désireuse
                        d’apprendre la langue des signes. SIGRA est une section de l’association sans but lucratif Langue
                        des Signes de Belgique Francophone (LSFB asbl).

                    </p>
                    <a href="#"
                        class="inline-flex items-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900">
                        Get started
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <section class="bg-white dark:bg-gray-900">
            <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                <div class="mr-auto place-self-center lg:col-span-7">
                    <h1
                        class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                        Notre <strong> mission </strong></h1>
                    <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">From
                        consiste à promouvoir l’accès des enfants et des jeunes à l’information et à la culture mais aussi à
                        la littérature, à la santé, aux loisirs, etc. Grâce à la Langue des Signes Francophone Belge (LSFB),
                        nous rendons cet accès possible et facilitons leur participation à la société de demain. </p>


                </div>
                <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                    <iframe class="mx-auto w-full lg:max-w-xl h-64 rounded-lg sm:h-96 shadow-xl"
                        src="https://player.vimeo.com/video/556090347" title="Vimeo video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </section>

        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 lg:py-16 mx-auto max-w-screen-xl px-4">
                <h2
                    class="mb-8 lg:mb-16 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900 dark:text-white md:text-4xl">
                    Subsides</h2>
                <div
                    class="grid grid-cols-2 gap-8 text-gray-500 sm:gap-12 md:grid-cols-2 lg:grid-cols-4 dark:text-gray-400">
                    <a href="#" class="flex justify-center items-center">
                        <img src="{{ asset('images/EN_co_fundedvertical_RGB_Monochrome-285x300.png') }}" alt="">
                    </a>
                    <a href="#" class="flex justify-center items-center">
                        <img src="{{ asset('images/fundation-300x219.png') }}" alt="">
                    </a>
                    <a href="#" class="flex justify-center items-center">
                        <img src="{{ asset('images/cap48.png') }}" alt="">
                    </a>

                    <a href="#" class="flex justify-center items-center">
                        <img src="{{ asset('images/eramust-removebg-preview-300x170.png') }}" alt="">
                    </a>
                </div>
            </div>
        </section>
    @endsection
</x-app-layout>
