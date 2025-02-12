<?php

$numeri = [1,2,3,4,5,6,7,8,9];

$maggioriDiQuattro = array_filter($numeri, function ($n) {
    return $n > 4;
});

echo '<h5>Risultato di array_filter (numeri maggiori di 4)</h5>';
echo '<pre>';
print_r($maggioriDiQuattro);
echo '</pre>';


$numeriAssoc = ["a" => 1, "b" => 2, "c" => 3];

//ARRAY_FILTER_USE_KEY Indica che vogliamo filtrare non più in base al valore, ma in base alla chiave. 
//Si utilizza per fare ricerche avanzate all'interno degli arrei associativi in cui abbiamo chiavi e valori. 
$filtrati = array_filter($numeriAssoc, function ($chiave){
    return $chiave === 'b';//Restituirà l'elemento la cui chiave è uguale a "b" 
}, ARRAY_FILTER_USE_KEY);


echo '<h5>Risultato di array_filter su array associativo ( Ricerca basata sulle chiavi )</h5>';
echo '<pre>';
print_r($filtrati);
echo '</pre>';


$numeriAssoc = ["a" => 1, "b" => 2, "c" => 3, "d" => 4, "e" => 5, "f" => 6, "g" => 7];

$filtrati = array_filter($numeriAssoc , function($valore, $chiave){
    return $valore > 4 || $chiave === "b"; 
}, ARRAY_FILTER_USE_BOTH);

echo '<h5>Risultato di array_filter su array associativo ( Ricerca basata su chiavi e valori )</h5>';
echo '<p>Mostra solo gli elementi il cui valore è superiore a 4, o quelli la cui chiave è identica a "b" </p>';
echo '<pre>';
print_r($filtrati);
echo '</pre>';