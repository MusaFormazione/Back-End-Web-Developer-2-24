<?php

$arr = array(1,2,3);//Sistema obsoleto 
$arr = [1,2,3];//Modalità più recente, consigliata 

//Creo un array riempiendolo di valori numerici all'interno di un range
$arr = range(1,10);

echo '<pre>';
echo 'Array generato con range:<br>';
var_dump($arr);
echo '</pre>';

//Verificare l'esistenza di una chiave prima di utilizzarla 

//Verifico se l'indice numero 1 esiste 
if(array_key_exists(1, $arr)){
    echo 'All\'interno dell\'array $arr esiste la chiave "1"<br>';
}
//Verifico se l'indice numero 5 esiste
if(isset($arr[5])){
    echo 'All\'interno dell\'array $arr esiste la chiave "5"<br>';
}

//Verifico se il valore tre esiste 
if(in_array(3, $arr)){
    echo 'All\'interno dell\'array $arr esiste il valore "3"<br>';
}

//Trovo la posizione del valore 3 all'interno della REI. 
$key = array_search(3, $arr);
echo "La posizione del valore 3 all'interno dell'array \$arr è $key";
