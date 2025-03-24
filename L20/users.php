<?php
require_once "connection.php";

header("Content-type: Application/json");

$sql = "SELECT * FROM utenti";

$query = $db->query($sql);

if($query){
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode($rows);
    
}else{

    echo json_encode([]);
}