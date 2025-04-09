<?php
require "../connection.php";
require_once "../functions.php";

$id = $_GET["id"] ?? "";

if(empty($id)) ErrorHandler::redirectToHome("Errore nella richiesta, riprovare", true);

$sql = "DELETE FROM pizze WHERE id = :id";

$query = $db->prepare($sql);

$query->bindParam(':id',$id, PDO::PARAM_INT);

if($query->execute()){
    ErrorHandler::redirectToHome("Eliminazione avvenuta con successo");
}else{
    ErrorHandler::redirectToHome("Errore durante l'eliminazione",true);
}