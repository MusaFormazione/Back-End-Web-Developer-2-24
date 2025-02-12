<?php

$saluto = fn() => 'Ciao';

echo '<h5>Risultato della funzione saluto:</h5>';
echo $saluto();

$b = fn(string $stringa): string => "<b>$stringa</b>";

echo '<h5>Risultato della funzione grassetto:</h5>';
echo $b('ciao');

$numeriAssoc = ["a" => 1, "b" => 2, "c" => 3];


$filtrati = array_filter(
    $numeriAssoc,
     fn($chiave)=> $chiave === 'b',
     ARRAY_FILTER_USE_KEY
);
echo '<h5>Risultato di array_filter su array associativo ( Ricerca basata sulle chiavi )</h5>';
echo '<pre>';
print_r($filtrati);
echo '</pre>';


$globale = 5;

$fnConVariabileEsterna = fn() => $globale;


echo '<h5>Questa funzione accede ad una variabile globale, eccone il valore: </h5>';
echo $fnConVariabileEsterna();
