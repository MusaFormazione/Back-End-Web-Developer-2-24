<?php 
include '../parts/header.php';
$auth->requireLogin();



if(isset($_GET['remove_from_cart'])){
    removeFromCart($_GET['remove_from_cart']);
}

if(!isCartEmpty()){
    $products = getCartProductDetails();

    include BASE_PATH . '/parts/cartTable.php';
    
} else {
?>
<div class="alert alert-info">
    Non ci sono prodotti nel carrello
</div>
<?php
}?>



<?php include '../parts/footer.php' ?>