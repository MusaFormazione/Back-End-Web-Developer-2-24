<?php

require_once __DIR__ . "/../connection.php";

$id = $_GET["id"] ?? "";

if(empty($id)) redirectToHome("Errore nella richiesta, riprovare", true);

$sql = "SELECT gusto, prezzo, disponibile FROM pizze WHERE id = $id";

$query = $db->query($sql);

if(!$query) die;


$pizza = $query->fetch(PDO::FETCH_ASSOC);
