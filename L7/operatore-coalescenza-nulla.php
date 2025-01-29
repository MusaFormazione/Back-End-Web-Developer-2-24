<?php


//Operatore di coalescenza nulla.
$nome = null;
//Il valore della variabile risultato potrà essere il nome dell'utente (se presente) oppure la stringa nome non disponibile qualora questo fosse null.
//Saranno numerose le situazioni in PHP in cui il valore di una determinata variabile risulterà uguale a null  
$risultato = $nome ?? 'Nome non disponibile';
echo "<p>$risultato</p>"; 


