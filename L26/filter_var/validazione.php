<?php

//filter_var
//Controlla un valore, se questo passa la validazione positivamente, allora il risultato sarà il valore iniziale, in caso contrario avremo false

//validazione numero intero
echo "<h6>Validate int</h6>";
$invalidInteger = "123abc";
$result = filter_var($invalidInteger, FILTER_VALIDATE_INT);
echo $result ? "$result è valido" : "Non è valido";


//validazione numero decimale
echo "<h6>Validate int</h6>";
$invalidFloat = "123";
$result = filter_var($invalidFloat, FILTER_VALIDATE_FLOAT);
//In questo caso anche un numero senza decimali risulta corretto
//Se riceve un numero intero lo restituisce però tipizzandolo come float/double.
echo $result ? "$result è valido" : "Non è valido";
echo "<br>"; 
echo gettype($result);
echo "<br>"; 

//validazione valori booleani
$invalidBool = "ABCD";
$result = filter_var($invalidBool, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE);
echo $result !== null ? "$result è valido" :  "Non è un booleano";
var_dump($result);
echo "<br>"; 


//validazione email
$invalidaEmail = "esempio#esempio.it";
$result = filter_var($invalidaEmail, FILTER_VALIDATE_EMAIL);
echo $result ? "$result è valido" : "Non è valido";
echo "<br>";


//validazione URL
$invalidUrl = "sito.it";
$result =  filter_var($invalidUrl, FILTER_VALIDATE_URL);
echo $result ? "$result è valido" : "NON è valido";
echo "<br>";

//filtrare numeri in un range
$numero = 1000;
$options = [
    "options" => ["min_range" => 1, "max_range" => 100]
];
$result =  filter_var($numero, FILTER_VALIDATE_INT, $options);
var_dump($result);
