<?php

$numeri = [10, 20, 30];

[$a, $b, $c] = $numeri;

echo "$a $b $c<hr>";

//utilizzo di &
$numeri = [10, 20, 30];
[$a, &$b, $c] = $numeri;

//$b al momento è legato alla posizione in memoria del dato, in seconda posizione dell'array $numeri
//Modificare il suo valore equivale a modificare anche l'array originale
$b = 99;

echo "\$b ora vale 99";
var_dump($numeri);//Si osserverà come la posizione uno adesso c'è il numero 99. 