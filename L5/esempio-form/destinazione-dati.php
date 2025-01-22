<?php
//Se i dati inviati dal modulo sono fondamentali per il funzionamento della pagina corrente, potresti optare per un redirect dopo aver controllato se i dati sono assenti 
if(!isset($_POST['email']) || !isset($_POST['password'])){
    header('Location:index.php');
    die;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Grazie per averci contattato</h1>

    <?php 
    //Ricorda di verificare l'esistenza dei dati prima di mostrarli, altrimenti potresti generare dei warning o addirittura degli errori fatali in base all'utilizzo che fai del dato 
    
    if(!empty($_POST['email']) && !empty($_POST['password'])):?>
    
    Il tuo indirizzo email è: <?=$_POST['email']  ?><br>
    La tua password è questa: <?=$_POST['password']  ?>
    
    <?php else:?>

        Devi compilare il form

    <?php endif; ?>
</body>
</html>