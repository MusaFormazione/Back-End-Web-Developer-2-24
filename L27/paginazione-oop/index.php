<?php require_once './connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>
<body>
    
    <?php include './query.php'?>
    <div class="container">

        <div class="row">
            <?php foreach($articoli as $articolo):
                [
                    'titolo' => $titolo,
                    'contenuto' => $contenuto
                ] = $articolo;
                ?>
                <div class="col-12 col-md-6 col-lg-3">
                    <?php include './parts/card.php'?>
                </div>
            <?php endforeach;?>
        </div>
        
        
        <div class="row">
            <div class="col-12">
                <?php include './parts/pagination.php'?>
            </div>
        </div>
        
        
    </div>
</body>
</html>