<?php 
include './classes/Pagination.php';
$pagination = new Pagination();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">

        <h1>Pagina: <?=$pagination->getPagina() ?></h1>

        <div class="row">
            <?php $pagination->renderPaginatedContent('./parts/card.php') ?>
        </div>
        
        
        <div class="row">
            <div class="col-12">
                <?php $pagination->renderPagination() ?>
            </div>
        </div>
        
        
    </div>
</body>
</html>