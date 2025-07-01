<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@php

    $pizze =  [
        [
            "gusto"=>"margherita",
            "prezzo"=>5
        ],
        [
            "gusto"=>"diavola",
            "prezzo"=> 1
        ],
        [
            "gusto"=>"marinara",
            "prezzo"=>4
        ]
    ];

@endphp

@each('partials.single-pizza', $pizze, 'pizza', 'partials.pizza-mancante');

{{--
Il quarto parametro è il nome della vista da mostrare se non ci sono elementi
 da mostrare, in questo caso 'partials.pizza-mancante'
 Se non viene specificato, verrà mostrata una vista vuota

@each('partials.single-pizza', $pizze, 'pizza', 'partials.pizza-mancante');
@each('partials.single-pizza', $pizze, 'pizza'); --}}

@php

// L'argomento interator della direttiva viene generato grazie al concetto delle variabili di variabili di PHP

    $nomeVariabile = 'test';

    $$nomeVariabile = 'valore';

    echo $test; // Stampa 'valore'

    //Grazie alle variabili di variabili in questo esempio generiamo una variabile per ogni pizza contenente una parte fissa ed una parte variabile.
    foreach($pizze as $pizza) {
        $gusto = $pizza['gusto'];//Salvo il gusto in una variabile.
        ${"prezzo_$gusto"} = $pizza['prezzo'];
        // ${"prezzo_$gusto"} Significa che voglio creare una variabile il cui nome è $prezzo_[gustopizza]
        //Questo genererà le variabili prezzo_margherita, prezzo_diavola e prezzo_marinara
    }
@endphp
<hr>

Prezzo margherita: {{ $prezzo_margherita }}<br>
Prezzo diavola:{{ $prezzo_diavola }}<br>
Prezzo marinara:{{ $prezzo_marinara }}<br>



</body>
</html>
