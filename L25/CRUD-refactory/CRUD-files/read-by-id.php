<?php

require_once __DIR__ . "/../connection.php";
require_once __DIR__ . "/../functions.php";

$id = $_GET["id"] ?? "";

if(empty($id)) ErrorHandler::redirectToHome("Errore nella richiesta, riprovare", true);

$sql = "SELECT gusto, prezzo, disponibile FROM pizze WHERE id = :id";

$query = $db->prepare($sql);

$query->bindParam(':id',$id,PDO::PARAM_INT);

if(!$query->execute()) die('Errore nella richiesta');

$pizza = $query->fetch(PDO::FETCH_ASSOC);
