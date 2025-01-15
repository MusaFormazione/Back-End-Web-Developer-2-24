<?php


$a = 1;
$b = 2;
$c = 3;

//Questi confronti servono ad ottenere dei booleani 
// var_dump( $a < $b && $c > $b  );//true
// var_dump( true && true  );//true

//Con l'operatore && Entrambe le condizioni esaminate devono essere vere per ottenere un True. 
echo "<h2>Operatore &&:</h2>";
echo "true && true => ";
var_dump(true && true);

echo "<br>";

"Operatore AND (altra sintassi):<br>";
echo "true AND true => ";
var_dump(true AND true);

echo "<p>Con questo operatore un solo false trasforma l'intero risultato in false. </p>";

echo "false && true => ";
var_dump(true && false);

echo "<hr>";

//Con l'operatore || È necessario che almeno una delle due condizioni sia true

echo "<h2>Operatore ||:</h2>";

"Operatore || :<br>";
echo "true || true => ";
var_dump(true || false);

echo "<br>";

"Operatore OR :<br>";
echo "true OR true => ";
var_dump(true OR false);

echo "<p>Con questo operatore un solo true trasforma l'intero risultato in true. </p>";

"Operatore || :<br>";
echo "false || false => ";
var_dump(false || false);

echo "<hr>";


echo "<h2>Operatore XOR:</h2>";

//Una delle condizioni deve essere vera e l'altra necessariamente falsa. 

"Operatore XOR :<br>";
echo "false XOR false => ";
var_dump(false XOR false);

echo "<br>";

"Operatore XOR :<br>";
echo "true XOR true => ";
var_dump(true XOR true);

echo "<br>";

"Operatore XOR :<br>";
echo "true XOR false => ";
var_dump(true XOR false);