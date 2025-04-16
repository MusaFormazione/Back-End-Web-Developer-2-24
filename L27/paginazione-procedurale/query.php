<?php

//query per la paginazione
//ottenere il numero di righe
//count(*) Indica che voglio ottenere il numero delle righe coinvolte nella query 
$sql = "SELECT count(*) FROM articoli";
$query = $db->query($sql);

if(!$query) die('Errore di paginazione');


$limite = 10;
$totaleRighe = $query->fetchColumn();
$righePaginazione = ceil($totaleRighe / $limite);


//query dei contenuti
$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;

if(!filter_var($pagina, FILTER_VALIDATE_INT)) die('Errore nell\'ottenere la pagina');

$offset = ($pagina - 1) * $limite;


//Query dei contenuti con limit e offset per ottenere i contenuti della pagina scelta
$sql = "SELECT * FROM articoli ORDER BY id ASC LIMIT $limite OFFSET $offset";
$query = $db->query($sql);

if(!$query) die('Errore nel recuperare gli articoli');

$articoli = $query->fetchAll();