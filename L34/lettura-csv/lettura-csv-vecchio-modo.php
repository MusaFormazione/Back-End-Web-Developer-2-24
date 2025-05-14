<?php

$file = __DIR__ . "/file.csv";

//Dato che devo leggere un file, verifico se questo esiste per evitare problemi successivi 
if(!file_exists($file)) die("File non trovato ($file)");

//Apro il file in modalità lettura. 
$fileHandle = fopen($file, 'r');

//Con fareed recupero una parte dei dati per leggerli. 
$dati =  fread($fileHandle, 100);

//A questo punto, per ottenere le righe del CSV vado a effettuare un taglio sulla stringa ottenuta ovunque ci sia una andata a capo. 
//PHP_EOL Si riferisce al carattere che indica la fine di una riga all'interno di un documento 
$righe = explode(PHP_EOL,$dati);

foreach($righe as $index => $riga){
    if($index === 0) continue;

    [$nome, $cognome, $anni] = explode(',', $riga);

    echo "Nome: $nome "; 
    echo "Cognome: $cognome "; 
    echo "Anni: $anni "; 

}

fclose($fileHandle);