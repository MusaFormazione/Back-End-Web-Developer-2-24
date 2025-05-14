<?php
//Questo è il nome del file che verrà creato o scritto 
$folder = __DIR__ . "/file-creati";
$file = "$folder/file-creato-con_file_put_contents.txt";//Tieni presente che il nome del file in realtà può comprendere anche il percorso dove questo file si troverà 

//Una buona pratica è verificare se il file esiste 
// if(!file_exists($file)) die('Il file non esiste');
//Ho commentato questa parte perché fopen con il valore W come modalità andrà a creare il file se questo non esiste Quindi non avrebbe senso bloccare lo script laddove il file assente lo vado comunque a creare 

//Dato che il percorso in cui il file si trova Porta ad una cartella che non esiste, verifichiamo la sua esistenza grazie alla funzione is_dir 
if(!is_dir($folder)){
    //A questo punto possiamo decidere di bloccare l'esecuzione dello script oppure creiamo direttamente la cartella 
    mkdir($folder);//Procedo quindi creando la cartella con mkdir 
}


if(file_put_contents($file,"Ciao Mondo!\n",FILE_APPEND)){
    echo "File scritto con successo";
}else{
    echo "Errore nella scrittura del file";
}