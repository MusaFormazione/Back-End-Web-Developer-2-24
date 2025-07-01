<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TITOLO MODIFICATO</title>

    </head>
    <body>

        <h1>Esempi con le direttive blade</h1>

        <h2>Direttive condizionali</h2>

        {{-- Questo è un commento di Blade.  --}}

        {{-- La direttiva sottostante serve ad aprire e chiudere il tag di PHP è un accesso rapido e pulito per poter scrivere nel PHP direttamente all'interno dei file blaide, ma dovresti evitarla il più possibile. --}}
        @php
            // Se lavori correttamente Questi questa direttiva che apre e chiude PHP probabilmente non ti servirà mai.
            $userRole = 'customer';
        @endphp

        {{-- Puoi riconoscere le direttive di Blade perché sono anticipate da una chiocciola e non necessitano di un punto e virgola in chiusura Dell'istruzione.  --}}

        {{-- Non userai più IF/ELSEIF/ELSE els come facevi con Php, ma ti basta adoperare le direttive @IF/@ELSEIF/@ELSE/@ENDIF  --}}
        @if($userRole === 'admin')
            <h3>Ruolo utente: amministratore</h3>
        @elseif($userRole === 'customer')
            <h3>Ruolo utente: Cliente</h3>
        @else
            <h3>Utente non loggato</h3>
        @endif


        @php
            $name = 'Mario';
            $carrello = [];
        @endphp

        {{-- @isset() sostituisce if(isset()) --}}
        @isset($name)
            <p>{{$name}}</p>
        @endisset

        {{-- @isset() sostituisce if(isset()) --}}
        @empty($carrello)
            <p>Il carrello è vuoto</p>
        @endempty

        <h2>Direttive loop</h2>

        @php
            $tasks = ["Scrivere il codice","Testare l'app","fare il deploy"];
        @endphp

        <h3>Elenco attività da svolgere:</h3>

        <ul>
            @foreach ($tasks as $task)
                <li>{{$task}}</li>
            @endforeach
        </ul>

        <h3>Ciclo con forelse</h3>
        @php
            $carrello = ['Elemento1','Elemento2','Elemento3'];
        @endphp

        <ul>
            {{-- @forelse è una struttura ciclica ibridata con una struttura condizionale Che gestisce anche un output alternativo in caso di array vuoto.  --}}
            @forelse ($carrello as $elemento)
                <li>{{$elemento}}</li>
            @empty
                <li>Carrello vuoto</li>
            @endforelse
        </ul>

        <h3>Includere le views</h3>

        @includeIf('partials.titolo')

    </body>
</html>
