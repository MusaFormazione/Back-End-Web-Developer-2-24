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
            "gusto"=>"Diavola",
            "prezzo"=> 1
        ],
        [
            "gusto"=>"marinara",
            "prezzo"=>4
        ]
    ];

@endphp

@each('partials.single-pizza', $pizze, 'pizza', 'partials.pizza-mancante');




</body>
</html>
