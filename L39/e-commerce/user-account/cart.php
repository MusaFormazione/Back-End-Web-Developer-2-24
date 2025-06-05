<?php 
include '../parts/header.php';
$auth->requireLogin();

$ids = getCartItemsIds();

$products = sessionCartToProductCart($ids);

var_dump($_SESSION['cart']);

if(isset($_GET['remove_from_cart'])){
    removeFromCart($_GET['remove_from_cart']);
}

?>

<table class="table">

    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Prezzo</th>
        <th>Azioni</th>
    </tr>

    <?php foreach($products as $p):
        
        [
            'id' => $id,
            'nome' => $nome,
            'prezzo' =>  $prezzo
        ] = $p;

        ?>    
        <tr>
            <td><?=$id?></td>
            <td><?=$nome?></td>
            <td><?=$prezzo?></td>
            <td>
                <a href="?remove_from_cart=<?=$id?>" class="btn btn-danger">Rimuovi dal carrello</a>
            </td>
        </tr>
    <?php endforeach;?>

</table>


<?php include '../parts/footer.php' ?>