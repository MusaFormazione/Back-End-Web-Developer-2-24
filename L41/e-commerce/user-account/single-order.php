<?php include '../parts/header.php';
$auth->requireLogin();

$id = $_GET['id'];

$conn = new Connection("ecommerce-2-24", "Michele", "password");

$db = $conn->getConnection();

$sql = "SELECT 

    ordini.id AS ordine_id, 

    ordini.data,
    ordini_prodotti.quantita,

    prodotti.id AS prodotto_id,
    prodotti.nome,
    prodotti.prezzo

FROM 
    ordini
INNER JOIN 
    ordini_prodotti ON  ordini.id = ordini_prodotti.order_id
INNER JOIN  
    prodotti ON prodotti.id = ordini_prodotti.prodotto_id
WHERE ordini.id = $id
";

$query = $db->query($sql);

$results = $query?->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($results);
// echo '</pre>';

?>

<h1>Ordine N°<?=$results[0]['ordine_id']?></h1>
<h3>Data ordine <?=$results[0]['data']?></h3>

<table class="table">

    <tr>
        <th>#</th>
        <th>Nome Prodotto</th>
        <th>Prezzo</th>
        <th>N°</th>
    </tr>

    <?php 
    

    foreach($results as $p):
        
        [
            'prodotto_id' => $id,
            'nome' => $nome,
            'prezzo' =>  $prezzo,
            'quantita' =>  $qty,
        ] = $p;

        ?>    
        <tr>
            <td><?=$id?></td>
            <td><?=$nome?></td>
            <td><?=$prezzo?></td>
            <td><?=$qty?></td>
        </tr>
    <?php endforeach;?>

    <tfoot>
        <tr>
            <td colspan="2"><b>Totale</b></td>
            <td>
            </td>
        </tr>
    </tfoot>
</table>



<?php include '../parts/footer.php' ?>