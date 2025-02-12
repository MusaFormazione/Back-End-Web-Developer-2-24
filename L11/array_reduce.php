<?php

$numeri = [1,2,3,4,5,6,7,8,9,10];

$somma = array_reduce($numeri, function($carry, $item){
    return $carry + $item;
}, 0);

echo '<h5>Risultato di array reduce(numeri sommati)</h5>';
echo '<pre>';
print_r($somma);
echo '</pre>';


$concatenamento = array_reduce($numeri, function($carry, $item){
    return $carry . $item;
}, '');

echo '<h5>Risultato di array reduce(numeri concatenati in una stringa)</h5>';
echo '<pre>';
print_r($concatenamento);
echo "<br>Tipo di dato:";
echo gettype($concatenamento);
echo '</pre>';
