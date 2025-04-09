<?php
require_once "config.php";
require BASE_PATH . "/includes/connection.php";

$sql = "SELECT * FROM pizze ORDER BY gusto ASC";

$query = $db->query($sql);

if(!$query) {
    //gestisci errore con un messaggio
    die();
}

$pizze = $query->fetchAll(PDO::FETCH_ASSOC);