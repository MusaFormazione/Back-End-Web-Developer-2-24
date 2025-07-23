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
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/new-pizza">Aggiungi pizza</a></li>
        </ul>

        <hr>
        <hr>
        <hr>
        {{-- {{ dd($pizzas) }} --}}

        <h1>Lista Pizze</h1>

        @if(session('success'))

            <p>{{session('success')}}</p>

        @endif


        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gusto</th>
                    <th>Prezzo</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pizzas as $pizza)
                    <tr>
                        <td>{{ $pizza->id }}</td>
                        <td>{{ $pizza->gusto }}</td>
                        <td>{{ $pizza->prezzo }} €</td>
                        <td>
                            <a href="/pizza/{{ $pizza->id }}/edit/">Modifica</a>
                            <form action="/pizza/{{ $pizza->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>
