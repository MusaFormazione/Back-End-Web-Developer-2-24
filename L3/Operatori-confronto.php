<?php

$anni = 30;

//Che quando provo a mostrare a schermo un booleano positivo, questo viene convertito in una stringa contenente il numero 1
echo $anni == 30;

echo "<hr>";

//Il corrispondente numerico di un valore truthy è 1 
//Il corrispondente numerico di un valore falsy è 0

echo "<h4>anni != 30 </h4>";
var_dump($anni != 30);//false perchè i valori sono uguali

echo "<h4>anni == 30 </h4>";
var_dump($anni == 30);//true perchè i valori sono uguali

//Con l'operatore == La stringa contenente il numero 30 viene convertita in numero, a quel punto i valori risulteranno essere uguali
echo "<h4>anni == '30' </h4>";
var_dump($anni == '30');

echo "<h4>anni === '30' </h4>";
var_dump($anni === '30');//False, perché nonostante i valori siano uguali, i tipi di dato sono diversi. 

echo "<h4>anni !== '30' </h4>";
var_dump($anni !== '30');//False, perché nonostante i valori siano uguali, i tipi di dato sono diversi. 

echo "<h4>anni > 30</h4>";
var_dump($anni > 30);//False, anni è uguale a 30 e non superiore

echo "<h4>anni < 30</h4>";
var_dump($anni < 30);//False, anni è uguale a 30 e non inferiore

echo "<h4>anni <= 30</h4>";
var_dump($anni <= 30);//true. Sono concessi tutti i numeri da 30 in giù, 30 compreso

echo "<h4>anni >= 30</h4>";
var_dump($anni >= 30);//true. Sono concessi tutti i numeri da 30 in su, 30 compreso


echo "<hr>";


$risultato = $anni >= 30;
//Operatore ! 
var_dump(!$risultato);//false

echo '<p>Operatore ! per la conversione rapida in booleano</p>';
var_dump(!!30);//false


//operatore spaceship
//Usato per confrontare i numeri 
echo '<p>Confronto tra 20 e 30</p>';
echo 20 <=> 30;// -1 => Il numero piu grande si trova a destra dell'operatore. 

echo '<p>Confronto tra 30 e 20</p>';
echo 30 <=> 20;// 1 => Il numero piu grande si trova a sinistra dell'operatore. 

echo '<p>Confronto tra 20 e 20</p>';
echo 20 <=> 20;// 0 => I numeri sono uguali 

