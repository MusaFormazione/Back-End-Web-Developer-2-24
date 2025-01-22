<?php

//Vecchio sistema, oggi sconsigliato 
$arrayOld = array(1,211,4,5,7,8);

//Nuovo sistema: Consigliato, più semplice e più breve. 
$arrayNew = [1,2,4,5,7,892];


//echo $arrayNew;//array to string conversion: Non posso fare echo di un array, in quanto echo converte il dato in stringa, e in PHP non è possibile convertire gli array in string. 

//Puoi utilizzare il tag pre per abbracciare una istruzione wardenp In modo da osservare anche gli spazi e li andate a capo predisposte nell'output di var_dump
//In parole povere, il tag pre ti permette di vedere in maniera molto più chiara il contenuto di un vardump I in fase di debug
echo "<pre>";
var_dump($arrayNew);
echo "</pre>";


$pizze = ['Margherita','Marinara', 'Diavola'];

//lettura da un array
echo 'La pizza numero due è la seguente: ' . $pizze[1] . '<br>';

//echo $pizze[5];//non esiste un elemento con indice 5, quindi riceverò un warning
//Meglio controllare l'esistenza di un valore se c'è la possibilità che questo non esista

//scrittura in un array
$pizze[1] = '4 Formaggi';

echo 'Ora la pizza numero due è la seguente: ' . $pizze[1] . '<br>';

//La riga seguente assegna una nuova pizza in un indice ben lontano dall'ultimo inserito all'interno dell'array, questa situazione va a creare dei buchi nell'array che potrebbero causare diversi problemi; Soprattutto quando cicliamo l'array 
// $pizze[8] = 'Napoli';
// echo "<pre>";
// var_dump($pizze);
// echo "</pre>";


//Aggiungere un nuovo valore all'array
$pizze[] = 'Capricciosa';//È come fare push() in javascript
echo 'Ho aggiunto una nuova pizza, ed è la numero 3: ' . $pizze[3] . '<br>';

//scoprire la lunghezza dell'array
//Count vuole come argomento un array e restituisce il numero di elementi al suo interno. 
echo 'Nell\'array $pizze ci sono ' . count($pizze) . ' elementi';

echo '<hr>';

echo '<h2>Array associativi</h2>';

//Definire un aria associativo.

$persona = [
    'nome' => 'Mario',
    'cognome' => 'Rossi' 
];

//Scrittura in un array associativo
$persona['anni'] = 30;//aggiungo 'anni' => 30

echo "<pre>";
var_dump($persona);
echo "</pre>";

//Lettura da un array associativo. 

echo "L'utente si chiama " . $persona['nome'];