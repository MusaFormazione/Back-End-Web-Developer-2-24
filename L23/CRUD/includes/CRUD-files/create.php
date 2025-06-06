<?php
//Creo questo file con l'intenzione di non farvi permanere l'utente, quindi dovrò mandarlo via se qualcosa va storto, ma anche in caso di operazione avvenuta con successo
require_once "../connection.php";
require_once "../functions.php";


if($_SERVER['REQUEST_METHOD'] != 'POST') redirectToHome("Pagina non accessibile",true);

$gusto = $_POST['gusto'] ?? '';
$prezzo = $_POST['prezzo'] ?? '';
$disponibile = $_POST['disponibile'] ?? '';
//todo: crea una funzione che esegue isset su ogni campo in automatico

if(empty($gusto) || empty($prezzo) || empty($disponibile)) redirectToHome("Tutti i campi devono essere compilati", true);
//todo: crea una funzione che esegue empty su ogni campo in automatico


//ottenere i valori dalla chiamata POST
try {
    
    //scrivo la query
    $sql = "INSERT INTO pizze (gusto, prezzo, disponibile) VALUE (:gusto, :prezzo, :disponibile)";

    //preparo la query
    $query = $db->prepare($sql);

    //sostituisco i parametri con i valori
    $query->bindParam(':gusto', $gusto);
    $query->bindParam(':prezzo', $prezzo);
    $query->bindParam(':disponibile', $disponibile);

    //eseguo la query
    if($query->execute()){
        redirectToHome("Pizza $pizza inserita con successo");
    }else{
        redirectToHome("Errore nell'inserimento della pizza",true);
    }


} catch (PDOException $e) {
    redirectToHome("Errore nell'inserimento della pizza",true);
}