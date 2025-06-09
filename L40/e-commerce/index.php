<?php 
include './parts/header.php';
include './classes/Pagination.php';

$pagination = new Pagination();
?>

<div class="container">

<h1>Prodotti</h1>

<div class="row">

    <?php $pagination->renderPaginatedContent(
        cardTemplate: './parts/product-card.php', 
        auth: $auth
        ) ?>

</div>

<div class="row">
    <?php
        $pagination->renderPagination()
    ?> 
</div>

</div>


<?php include './parts/footer.php' ?>