<?php
//Creo questo file con l'intenzione di non farvi permanere l'utente, quindi dovrò mandarlo via se qualcosa va storto, ma anche in caso di operazione avvenuta con successo
require_once "../connection.php";
require_once "../functions.php";


if($_SERVER['REQUEST_METHOD'] != 'POST') redirectToHome("Pagina non accessibile",true);


 [
    "gusto" => $gusto,
    "prezzo" => $prezzo,
    "disponibile" => $disponibile
 ] = getCheckedData('gusto','prezzo','disponibile');

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