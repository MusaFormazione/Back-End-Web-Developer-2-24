<?php require '../common/Connection.php';
//Riadopero la classe connection creata nella lezione precedente La quale ci permetterà di connetterci facilmente al database per effettuare delle query 
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

        //La query che vedi deve mostrare la lista di tutti gli utenti ed il relativo nome ruolo, ma siccome i ruoli del nostro database hanno una tabella a parte, dobbiamo procedere facendo una join 
        // tra la tabella utenti e la tabella ruoli, usando la colonna ruoloId come chiave di join.
        //ruoloId è una chiave esterna nella tabella utenti che riferisce alla colonna id nella tabella ruoli.
        $sql = "SELECT 
             utenti.nome as nome_utente, utenti.cognome, utenti.email,
             ruoli.nome as nome_ruolo
        FROM utenti INNER JOIN ruoli
        ON utenti.ruoloId = ruoli.id";

        $query = $conn->getConnection()->query($sql);

        $righe = $query->fetchAll(PDO::FETCH_ASSOC);

        if(!$righe) die;

       include '../common/Table.php';
       $table = new JoinTable($righe);
       $table->renderTable();
    ?>

</body>
</html>