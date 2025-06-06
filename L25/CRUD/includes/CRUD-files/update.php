<?php
require_once "../connection.php";
require_once "../functions.php";

$id = $_GET['id'] ?? '';

if(empty($id)) redirectToHome('Errore nella richiesta, riprovare', true);


[
    "gusto" => $gusto,
    "prezzo" => $prezzo,
    "disponibile" => $disponibile
] = getCheckedData('gusto','prezzo','disponibile');



$sql = "UPDATE pizze 
SET gusto = :gusto, prezzo = :prezzo, disponibile = :disponibile
WHERE id = :id";


$query = $db->prepare($sql);

$query->bindParam(':id',$id,PDO::PARAM_INT);
$query->bindParam(':gusto',$gusto, PDO::PARAM_STR);
$query->bindParam(':prezzo',$prezzo,PDO::PARAM_INT);
$query->bindParam(':disponibile',$disponibile, PDO::PARAM_INT);

if($query->execute()){
    redirectToHome("Pizza $gusto (con id: $id), modificata con successo");
}else{
    redirectToHome("Errore nella modifica della pizza $gusto (con id : $id), riprovare.");
}