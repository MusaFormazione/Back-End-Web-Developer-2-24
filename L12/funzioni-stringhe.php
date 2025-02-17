<?php
$nl = "<br>\n";

echo "<h3>strlen</h3>"  . $nl;

$stringa1 = 'Hello World!';

echo "La stringa $stringa1 è lunga " . strlen($stringa1);
//Stringa lunga 12 caratteri

//Trasforma i caratteri in maiuscolo o minuscolo.

echo "<h3>strtoupper/strtolower/ucfirst</h3>" . $nl;

$stringa2 = 'hello World!';

echo "Originale: $stringa2" . $nl;
echo "Maiuscolo: " . strtoupper($stringa2) . $nl;
echo "Minuscolo: " . strtolower($stringa2) . $nl;
echo "Prima lettera maiuscola: " . ucfirst($stringa2) . $nl;


echo "<h3>Rimozione spazi all'inizio e alla fine di una stringa</h3>" . $nl;

$stringa3 = '    Hello World!       ';

echo "Originale: $stringa3" . $nl;
echo "trim: " . trim($stringa3) . $nl;
echo "ltrim: " . ltrim($stringa3) . $nl;
echo "rtrim: " . rtrim($stringa2) . $nl;

echo "<h3>Sostituisco una porzione di stringa con una sotto stringa </h3>" . $nl;
$stringa4 = 'Hello World!';

echo "Originale: $stringa4" . $nl;
echo "Dopo la sostituzione : " . str_replace('Hello','Ciao', $stringa4) . $nl;
echo "Dopo la sostituzione case insensitive : " . str_ireplace('hello','Ciao', $stringa4) . $nl;


echo "<h3>Explode/implode</h3>" . $nl;

$stringa5 = "Mario, Rossi, 30";

$arrayDaStringa5 = explode(", ", $stringa5);
echo "Dopo l'utilizzo di explode con separatore \", \" $nl";
var_dump($arrayDaStringa5);
echo $nl;

//Posso anche destrutturare
[$nome, $cognome, $anni] = $arrayDaStringa5;
echo "Valori destrutturati  => nome: $nome, cognome: $cognome, anni: $anni $nl";

echo "Dopo l'utilizzo di implode con separatore \",\" $nl";

echo implode(', ',$arrayDaStringa5);



echo "<h3>str_contains</h3>" . $nl;

$stringa6 = "Questo è un esempio in PHP";

echo "cerco js nella frase \"$stringa6\": $nl";
var_dump(str_contains($stringa6, 'js'));

echo $nl;

echo "cerco PHP nella frase \"$stringa6\": $nl";
var_dump(str_contains($stringa6, 'PHP'));
