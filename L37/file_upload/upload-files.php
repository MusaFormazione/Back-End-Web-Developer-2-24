<?php

var_dump($_FILES);

//Verifica se il file è stato caricato 
if(!isset($_FILES['image']) || $_FILES['image']['error'] !== 0) 
die("errore nell'invio dell'immagine");


//Preparo i parametri del file caricato mettendole all'interno di comode variabili.
$fileName = $_FILES['image']['name'];//Nome originale dell'immagine 
$fileTmp = $_FILES['image']['tmp_name'];//Percorso temporaneo al file 
$fileSize = $_FILES['image']['size'];//Dimensione del file
$fileType = mime_content_type($fileTmp);//Per ottenere il tipo di file in modo più sicuro 

//A questo punto posso controllare ed eventualmente limitare l'estensione del file
$allowedTipes = ['image/jpeg','image/png','image/svg+xml'];
if(!in_array($fileType, $allowedTipes))
die('Errore: Sono accettati solo .jpg, .png');



//Ora se voglio posso limitare il peso del file che verrà caricato
$maxMb = 2;//Dimensione in megabyte
$maxFileSize = $maxMb * 1024 * 1024;
if($fileSize > $maxFileSize)
die("Errore, il file è troppo pesante (Max {$maxMb}mb)");


//Se voglio posso anche limitare le dimensioni dell'immagine
$imageSize = getimagesize($fileTmp);
[$width, $height] = $imageSize;

echo "Dimensioni dell'immagine: $width(w) x $height(h)<br>";

if($width > 1920 || $height > 1080)
die("Errore: L'immagine supera le dimensioni massime()1920x1080");

//Controllo o eventuale creazione della directory in cui vogliamo caricare il file 
$uploadDir = 'uploads/';
if(!is_dir($uploadDir)){
    mkdir($uploadDir);
}


//Ora è il momento dello spostamento del file nella directory desiderata

$destination = $uploadDir . $fileName;

if(move_uploaded_file($fileTmp, $destination)){
    echo "Immagini caricate con successo nella cartella $uploadDir <a href=\"$destination\">Visualizza il file $fileName</a>";
}else{
    echo "Errore: Non è stato possibile caricare il file : $fileName";
}
