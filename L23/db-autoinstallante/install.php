<?php 

require_once("./connection.php");

//Query che crea la tabella 
$sql = "CREATE TABLE IF NOT EXISTS prodotti(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    prezzo DECIMAL(10,2) NOT NULL,
    quantita INT DEFAULT 0,
    descrizione TEXT
)";

//Eseguo la query. 
$query = $db->query($sql);

//Se è l'acquario è andata a buon fine, mostra un messaggio di successo
if($query){
    echo "Installazione avvenuta";
    //Eventualmente al termine dell'installazione puoi procedere all'eliminazione del file 
    // unlink("./install.php");
}