<?php
require_once 'ListSystem.php';

$ls = new ListSystem('Lista della spesa');
$ls2 = new ListSystem('Lista delle cose da fare');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <div class="row">

        <div class="col">
            <?php $ls->renderForm();?>    
        </div>
        <div class="col pt-5">
            <?php $ls->renderList() ?>
        </div>

        <div class="col-12">
            <?php $ls->renderDeleteForm() ?>
        </div>
    
    </div>
</div>


<div class="container">

    <div class="row">

        <div class="col">
            <?php $ls2->renderForm();?>    
        </div>
        <div class="col pt-5">
            <?php $ls2->renderList() ?>
        </div>
    
    </div>
</div>

 
    
</div>
</body>
</html>