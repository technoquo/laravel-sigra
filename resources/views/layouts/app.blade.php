<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

</head>

<body class="font-sans antialiased">
    @yield('css')

    @include('layouts.partials.header')

    @yield('hero')

    <main>
        {{ $slot }}
    </main>
    @include('layouts.partials.footer')



    @stack('modals')


    <script>
        // const hamburger = document.querySelector(".hamburguer-menu svg");
        // hamburger.addEventListener("click", function() {
        //     const menuPrincipal = document.querySelector(".container-menu");
        //     menuPrincipal.classList.toggle("mostrar");
        // });
    </script>

    @livewireScripts

</body>

</html>
