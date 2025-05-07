<?php require '../common/Connection.php';
$conn = new Connection('join-2-24','Michele','password');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    

<?php

    $sql = "SELECT
        ordini.id as id_ordine,
        utenti.id as id_utente, utenti.nome, utenti.cognome, utenti.email,
        ordini.data
        FROM utenti INNER JOIN ordini
        ON utenti.id = ordini.userId
    ";

    $query = $conn->getConnection()->query($sql);

    $ordini =  $query->fetchAll(PDO::FETCH_ASSOC);

    if(!$ordini) die;
       
       include '../common/Table.php';
       $table = new JoinTable($ordini);
       $table->renderTable();
?>
</body>
</html>