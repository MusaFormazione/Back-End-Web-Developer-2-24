<?php

$numeri = [1,2,3,4,5,6,7,8,9];

$risultato = array_map(function($n){
    return $n * 2;//Ogni elemento del riciclato viene moltiplicato per due 
}, $numeri);

echo '<h5>Risultato di array map(numeri raddoppiati)</h5>';
echo '<pre>';
print_r($risultato);
echo '</pre>';

$array1 = [1,2,3];
$array2 = [4,5,6];

//Uso avanzato: Combinare due array 
//Nota: Se gli array hanno dimensioni diverse e l'operazione si ferma al array più corto.  
$somme = array_map(function($x, $y){
    //$x è un puntatore ai valori dell'array numero 1
    //$y è un puntatore ai valori dell'array numero 2
    return $x + $y;//Sommo le copie di elementi. 
}, $array1, $array2);

echo '<h5>Risultato di array map con due array (numeri sommati)</h5>';
echo '<pre>';
print_r($somme);
echo '</pre>';