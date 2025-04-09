<?php 
include "./includes/header.php";
$id = $_GET["id"] ?? "";

if(empty($id)) ErrorHandler::redirectToHome("Errore nella richiesta, riprovare", true);
?>

<div class="container">

    <div class="row">
        <div class="col-12 text-center">
            <h1>Conferma eliminazione</h1>
            <h2>Sei sicuro di voler eliminare?</h2>
        </div>
        
        <div class="col-6 text-center">
            <a href="./CRUD-files/delete.php?id=<?=$id?>" class="btn btn-danger">Si</a>
        </div>
        <div class="col-6 text-center">
            <a href="index.php?message=<?=urldecode("Eliminazione annullata")?>" class="btn btn-secondary">No</a>
        </div>

    </div>
    
</div>
<?php include "./includes/footer.php";?>