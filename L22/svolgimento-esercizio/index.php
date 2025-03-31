<?php require_once("connection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <?php

    $nome = $_GET["s"] ?? "";
    if(empty($nome)){
        $sql = "SELECT nome, prezzo, categoria, disponibile FROM prodotti";
    }else{
        $sql = "SELECT nome, prezzo, categoria, disponibile FROM prodotti WHERE nome LIKE '%$nome%'";
        //È questione di tempo, non andiamo a controllare la variabile nome, ma normalmente dovresti ripulirla e controllarla 
    }
    
    $query = $db->query($sql);
    
    if($query):

        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        $nRes = $query->rowCount();
    ?>
    <div class="container">

        <h1>Cerca</h1>
        <form>
            <input type="search" value="<?=$nome?>" name="s" class="form-control" placeholder="Cerca per nome prodotto">
            <button class="btn btn-primary">Cerca</button>
            <a href="index.php" class="btn btn-info">Elimina filtri</a>
        </form>
        <a href="index.php?s=cuffie" class="btn btn-success">Filtra con un click: Cuffie</a>
        
        <h1>Lista Prodotti</h1>
        
        <table class="table">
            <caption>N°<?=$nRes?> risultati</caption>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Prezzo</th>
                    <th>Categoria</th>
                    <th>Disponibile</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $prodotto){
                    
                    [
                        "nome"=> $nome,
                        "prezzo" => $prezzo,
                        "categoria" => $cat,
                        "disponibile" => $disponibile
                    ] = $prodotto;

                    ?>
                    <tr>
                        <td><?=$nome?></td>
                        <td><?=$prezzo . "€"?></td>
                        <td><?=$cat?></td>
                        <td><?=$disponibile ? "Si" : "No"?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            
        </div>
<?php endif; ?>
    
</body>
</html>