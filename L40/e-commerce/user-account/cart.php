<?php 
include '../parts/header.php';
$auth->requireLogin();

$products = getCartProductDetails();

if(isset($_GET['remove_from_cart'])){
    removeFromCart($_GET['remove_from_cart']);
}

?>

<table class="table">

    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Prezzo</th>
        <th>N°</th>
        <th>Azioni</th>
    </tr>

    <?php foreach($products as $p):
        
        [
            'id' => $id,
            'nome' => $nome,
            'prezzo' =>  $prezzo,
            'qty' =>  $qty,
        ] = $p;

        ?>    
        <tr>
            <td><?=$id?></td>
            <td><?=$nome?></td>
            <td><?=$prezzo?></td>
            <td><?=$qty?></td>
            <td>
                <a href="?remove_from_cart=<?=$id?>" class="btn btn-danger">Rimuovi dal carrello</a>
            </td>
        </tr>
    <?php endforeach;?>

</table>

<a href="<?=BASE_URL?>/user-account/order-confirm.php" class="btn btn-primary">Invia ordine</a>


<?php include '../parts/footer.php' ?>