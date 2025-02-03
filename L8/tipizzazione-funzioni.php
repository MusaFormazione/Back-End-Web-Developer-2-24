<?php
declare(strict_types=1);
//Da questo momento in poi i parametri di tipo stringa non verranno convertiti in numero neanche se contengono solo ed esclusivamente numeri. 

//Questa funzione somma due valori, a patto che questi siano di tipo numerico intero 
function add(int $a, int $b): int{
    return $a + $b;
}

add(4,5);

//Posso adoperare delle Union Type per migliorare la consistenza dei dati in entrata e in uscita 
function addIntFloat(int|float $a, int|float $b): int|float{
    return  $a + $b;
}

function somma(int $a, int $b):int{
    return $a + $b;
}


//Le stringhe contenente contenenti numeri vengono convertite in caso di operazione matematica compatibile. 
echo 'Somma tra la stringa contenente quattro e la stringa contenente 5 : ' . somma('4','5');
//Fatal error: Uncaught TypeError: somma(): Argument #1 ($a) must be of type int, string given
