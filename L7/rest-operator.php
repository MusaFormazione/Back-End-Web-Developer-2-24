<?php
//rest operator
//Unisce una serie di argomenti separati in un array 
//Si chiama rest operator quando lo si utilizza tra i parametri delle funzioni(o metodi)
//Questa funzione accetta N Argomenti e li inserisce in un array chiamato numeri.
//Poi somma tutti i numeri e restituisce la somma.  
function somma(...$numeri){
    return array_sum($numeri);
}

$risultato = somma(4, 2, 5, 6);//6

echo "4 + 2 + 5 + 6 = $risultato";