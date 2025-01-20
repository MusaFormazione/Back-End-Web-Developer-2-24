<?php

//Siccome il file variabili.php è incluso (include) nel file index.php le seguenti variabili saranno disponibili anche nel file di destinazione(index.php). 
$titolo = 'Home';
$backgroundColor = 'red';

//Anche la seguente funzione verrà importata all'interno del file index.php 
function getRandomNumber(){
    return rand(0,9999);
}
?>

<!-- Mentre i seguenti tag verranno normalmente mostrati in corrispondenza della posizione dell'include del file index.php -->
<p>Il file variabili.php si trova nella cartella: <?=__DIR__?></p>
<p>Il file in cui sto scrivendo è: <?=__FILE__?></p>