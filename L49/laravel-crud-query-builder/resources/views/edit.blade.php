<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body>

        <h1>Dettaglio pizza {{$pizza->gusto}}</h1>

        <form action="/pizza/{{ $pizza->id }}/update" method="POST">
            @csrf
            @method('PUT')

            <label for="gusto">Gusto</label>
            <input value="{{ $pizza->gusto }}" type="text" name="gusto" id="gusto">
            @error('gusto') <p>{{$message}}</p> @enderror

            <label for="prezzo">Prezzo</label>
            <input value="{{ $pizza->prezzo }}" type="text" name="prezzo" id="prezzo">
            @error('prezzo') <p>{{$message}}</p> @enderror

            <button>Modifica</button>
        </form>

        <a href="/">Torna alla lista pizze</a>

    </body>
</html>
