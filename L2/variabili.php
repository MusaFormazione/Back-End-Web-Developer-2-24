<?php

$variabile = 3;
echo $variabile;

//Posso assegnare ad una variabile un'operazione matematica 
$somma =  1 + 1;//2
//Posso anche assegnare una variabile ad un'altra variabile. 
$altraSomma = $somma;

echo '<br>';

//principali tipi di dato

$stringa = 'Questa è una stringa';
echo $stringa;
$stringa2 = "Questa è una stringa";
$integer = 4;
$float = 4.5;
$array = [1,2,3];


//Con ECHO posso scrivere a schermo solo tutto ciò che è convertibile in stringa, quindi non posso fare echo di un array o di un oggetto

//echo $array;//Array to string conversion 

//Quella che vedi qui sotto è una tecnica per vedere il contenuto di un array con una formattazione pulita e leggibile. 
//L'apertura e la chiusura del tag pre abbracciano il print R in questo modo possiamo vedere l'output con la formattazione creata da PHP.
echo '<pre>';
print_r($array);
echo '</pre>';

//stringhe
$stringaMultiRiga = "In php sono concessi
gli spazi nelle stringhe<br>";
echo $stringaMultiRiga;

//interpolazione
$nome = "Michele";
$interpolazione = "Ciao, mi chiamo $nome";

echo $interpolazione;

$variabileHeredoc = <<<EOD

    <p>
    Questo tipo di stringa può contenere numerose 
    linee e può anche essere utilizzata per effettuare l'interpolazione con variabili. 
    Ad esempio, ecco il valore della variabile interpolazione: $interpolazione 
    </p>

EOD;

echo $variabileHeredoc;

//CONCATENAMENTO

$saluto = 'Ciao';
echo $saluto . ', benvenuti al corso Backend Developer';

//conversione dati

//da stringa a numero
echo '1' + 0;//In questo caso, dato che la stringa contiene solo un numero e non anche delle lettere, avviene la conversione della stringa in numero 

//Ma per far si che questa conversione avvenga, la stringa deve contenere solo numeri, altrimenti si scatena un errore. Non sarà quindi possibile sommare una stringa ad un numero poiché l'operatore + è utilizzato solo per le operazioni matematiche, quindi si adopererà solo quando si hanno a disposizione due numeri 

echo '<hr>';

//da numero a stringa
echo '1' . 0;//Questa è una richiesta di concatenamento di stringhe, quindi quello che non è una stringa sarà convertito in numero se questa operazione è compatibile col tipo di dato che si vuol convertire 

echo '<hr>';

//altra conversione da stringa a numero
$str = '100';
$moltiplicazione = $str * 2;

echo $moltiplicazione;
