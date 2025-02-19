<?php
require_once 'ListSystem.php';

$ls = new ListSystem('Lista della spesa');
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

    
    <?php
    
    $ls->renderForm()
    
    ?>    
    
    
    <?php
$folder = 'todo-list-files';
$file = "$folder/db.json";
$todos = [];


if(file_exists($file)){
    
    $data = file_get_contents($file);
    
    $todos = json_decode($data);
    
}


if(count($todos) === 0){
    
    echo "<div class=\"alert alert-info\">La lista è vuota</div>";
    
}
?>

<div id="list">


    <?php foreach($todos as $todo): ?>

        <div class="alert alert-success"> <?=$todo?> </div>

    <?php endforeach; ?>


</div>



</div>



</body>
</html>