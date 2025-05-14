<?php

$file = __DIR__ . "/file.csv";

//Dato che devo leggere un file, verifico se questo esiste per evitare problemi successivi 
if(!file_exists($file)) die("File non trovato ($file)");

//Apro il file in modalità lettura. 
$fileHandle = fopen($file, 'r');

//fgets è come fwrite, però recupera solo la prima riga di un file e non richiede di sapere quanti dati recuperare 
$primaRiga =  fgets($fileHandle);//Lancio qui la prima lettura in modo da evitare che la prima riga sia inserita nell'array di utenti, dato che contiene solo i nomi dei campi. 
[$col1, $col2, $col3] = explode(',',$primaRiga);//Destrutturo in modo da avere variabili con i nomi delle colonne. 

//Quando avvio la lettura di un file devo immaginarmi un cursore che si muove all'interno di questo e si sposta man mano dall'inizio verso la fine fgets di fatto sposta il cursore alla fine della riga che ha appena recuperato ogni volta che viene lanciato. 


$utenti = [];

while(!feof($fileHandle)){

    $riga = fgets($fileHandle);

    //Può capitare che un CSV abbia anche delle righe vuote, quindi meglio verificare
    if(!empty($riga)){

        [$nome, $cognome, $anni] = explode(',', $riga);

        $utenti[] = [
            $col1 => $nome,
            $col2 => $cognome,
            $col3 => $anni,
        ];

    }

}

var_dump($utenti);


fclose($fileHandle);

//da vedere: variabili di variabili