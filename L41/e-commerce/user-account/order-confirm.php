<?php include '../parts/header.php';
$auth->requireLogin();

if(isCartEmpty()) header("Location: ".BASE_URL."/index.php");

$success = insertOrder();

if(!$success){
    ErrorHelper::setSessionError('Non è stato possibile convalidare l\'ordine, riprova più tardi',BASE_URL . '/user-account/cart.php');
}
?>

<div class="container">
    
    <h1>Ordine confermato</h1>

    <div class="row">
        <div class="col">
            <p>
                Il tuo ordine è stato inviato con successo.
            </p>
        </div>
        <div class="col-12">
            <a class="btn btn-primary" href="<?=BASE_URL . '/user-account/orders.php'?>">Consulta i tuoi ordini</a>
            <a class="btn btn-primary" href="<?=BASE_URL . '/index.php'?>">Continua gli acquisti</a>
        </div>
    </div>
    
</div>


<?php include '../parts/footer.php' ?>