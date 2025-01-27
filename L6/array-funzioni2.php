<?php

//Manipolazione
$pizze = ['Margherita','Diavola','Marinara'];

// $pizze[] = 'Capriccosa'; Per l'aggiunta di un valore si può adoperare anche questo sistema 

//Per l'aggiunta di numerosi valori è più comodo adoperare array_push
array_push($pizze, 'Capriccosa','4 formaggi');

echo '<pre>';
var_dump($pizze);
echo '</pre>';

//Rimuovo l'ultimo elemento e se voglio lo salvo in una variabile 
$ultimo = array_pop($pizze);
echo "La pizza $ultimo è stata rimossa dall'array \$pizze";

echo '<pre>';
var_dump($pizze);
echo '</pre>';

//Unset permette di rimuovere un elemento dall'array, ma provoca un buco nella numerazione, è quindi sconsigliato, è preferibile utilizzare sistemi come array_splice. 
// unset($pizze[2]);

// echo '<pre>';
// var_dump($pizze);
// echo '</pre>';

//Scoprire la lunghezza dell'array 
echo "Nell'array \$pizze ci sono " . count($pizze) . " pizze";

//Estrapolare chiavi e valori 
$pizze = [
    [
        'gusto' => 'Margherita',
        'prezzo' => 5
    ],
    [
        'gusto' => 'Diavola',
        'prezzo' => 1
    ],
    [
        'gusto' => 'Capriccosa',
        'prezzo' => 8
    ]
];

echo '<pre>';
var_dump($pizze);
echo '</pre>';

//Estrarre le chiavi da un array 
$chiavi = array_keys($pizze[0]);
echo "Le chiavi dell'array \$pizze sono le seguenti: <br>";
var_dump($chiavi);

//Estrarre i valori da un array 
$valori = array_values($pizze[0]);
echo "I valori dell'array \$pizze sono i seguenti: <br>";
var_dump($valori);
