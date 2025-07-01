<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        @yield('head')
    </head>
    <body>

        <ul>
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/pagina2">Pagina 2</a>
            </li>
            <li>
                <a href="/pagina3">Pagina 3</a>
            </li>
        </ul>


        <div class="container">

            @yield('content')

        </div>

        @yield('footer-scripts')
        </body>
</html>
