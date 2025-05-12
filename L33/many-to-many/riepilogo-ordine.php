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
    //Join tra ordini ed utenti. 
    $sql = "SELECT id FROM ordini";
    $query = $conn->getConnection()->query($sql);

    if(!$query) die('errore nel recupero degli ordini');

    $idOrdini = $query->fetchAll(PDO::FETCH_ASSOC);

    
?>
<form method="GET">
    <select name="order-id" class="form-control">
        <?php foreach($idOrdini as $id):?>
            <option><?=$id['id']?></option>
        <?php endforeach; ?>
    </select>
    <button class="btn btn-primary">Filtra per n° id ordine</button>
</form>

<?php


$filteredOrderID = $_GET['order-id'] ?? $idOrdini[0]; 

//Join tra ordini ed utenti. 
$sql = "SELECT
    ordini.id, ordini.data,
    utenti.nome as nome_utente, utenti.cognome,
    prodotti.nome as nome_prodotto, prodotti.prezzo,
    ordini_prodotti.quantita
    FROM 
        utenti
    INNER JOIN 
        ordini ON utenti.id = ordini.userId
    INNER JOIN 
        ordini_prodotti ON ordini.id = ordini_prodotti.order_id
    INNER JOIN
        prodotti ON prodotti.id = ordini_prodotti.prodotto_id
    WHERE ordini.id = :id
    ";


    $query = $conn->getConnection()->prepare($sql);
    $query->bindParam(':id',$filteredOrderID);
    $query->execute();

    if(!$query) die('errore nella query');


    $ordine =  $query->fetchAll(PDO::FETCH_ASSOC);

    if(!$ordine) die;

?>

<h1>Riepilogo ordine n°<?=$filteredOrderID?></h1>


<table class="table">
    <thead>
        <tr>
            <th>Nome Prodotto</th>
            <th>Prezzo unitario</th>
            <th>Quantità</th>
            <th>Subtot</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        

        foreach($ordine as $prodotto):
            
            [
                "nome_prodotto" => $nome,
                "quantita" => $qty,
                "prezzo" => $prezzo
            ] = $prodotto;

            $subTotal = $prezzo * $qty;


            ?>
            <tr>
                <td><?=$nome?></td>
                <td><?=$qty?></td>
                <td><?=$prezzo?>€</td>
                <td><?=$subTotal?>€</td>
            </tr>
        <?php endforeach;?>
    </tbody>
    <tfoot>
        <tr>
            <?php
            
            $totale = array_reduce($ordine, function($acc, $prodotto){
                [
                    "quantita" => $qty,
                    "prezzo" => $prezzo
                ] = $prodotto;

                $subTot = $prezzo * $qty;
                $tot = $acc + $subTot;
                return $tot;
            }, 0);

            ?>
            <th colspan="3">Totale:</th>
            <td><?=$totale?>€</td>
        </tr>
    </tfoot>
</table>

<a href="./index.php">Vai tabella ordini grezza</a>
</body>
</html>