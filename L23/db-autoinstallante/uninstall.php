<?php 

require_once("./connection.php");

//Preparo la query di eliminazione della tabella 
$sql = "DROP TABLE prodotti";

$query = $db->query($sql);

if($query){
    echo "Disinstallazione avvenuta";
}