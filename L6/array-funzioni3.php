<?php

//Ordinamento 
//Le funzioni di ordinamento modificano l'array originale

$arrAssoc = ["z" => 1, "a" => 2, "b" => 3];
echo "<h4> array associativo con ordine iniziale:</h4> ";
print_r($arrAssoc);

//Riordina l'array ma in caso diarrea associativo riscrive tutte le chiavi 
//Quindi attenzione a non usarlo su una re associativo, poiché vorrai tenere le chiavi testuali utili per il funzionamento dello script. 
sort($arrAssoc);
echo "<h4>array associativo riordinato con sort:</h4> ";
print_r($arrAssoc);

//Ripristino l'array per i prossimi esempi. 
$arrAssoc = ["z" => 1, "a" => 2, "b" => 3];

//Riordino l'array preservando le chiavi. 
asort($arrAssoc);
echo "<h4>array associativo riordinato:</h4> ";
print_r($arrAssoc);

//È possibile ordinare l'array in base alle chiavi e non ai valori
ksort($arrAssoc);
echo "<h4>array associativo riordinato:</h4> ";
print_r($arrAssoc);
echo '<br>';

echo '<h3>Manipolazione con splice</h3>';
//Aggiungere e rimuovere o sostituire con array_splice
$lettere = ['a','b','c','d','e'];

//schema d'utilizzo
// array_splice($array, $offset, $quantità, $sostituzione);

//rimozione del terzo elemento dell'array
array_splice($lettere, 3, 1);
echo "<h4>Array dopo l'eliminazione in posizione 3:</h4> ";
print_r($lettere);

//Aggiunta di un elemento in quarta posizione dell'array
array_splice($lettere, 4, 0, 'f');
echo "<h4>Array dopo l'aggiunta in posizione 4:</h4> ";
print_r($lettere);

//Sostituzione di un elemento in quarta posizione dell'array
array_splice($lettere, 4, 1, 'F');
echo "<h4>Array dopo la sostituzione in posizione 4:</h4> ";
print_r($lettere);


echo "<h3>Rimozione duplicati </h3> ";

$arrayConDuplicati = [1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,0,0];
echo "<h4>Array con duplicati: </h4> ";
print_r($arrayConDuplicati );

//Rimozione di duplicati dall'array
$unique = array_unique($arrayConDuplicati);
echo "<h4>Array dopo la rimozione di duplicati: </h4> ";
print_r($unique);