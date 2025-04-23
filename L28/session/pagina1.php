<?php
//Utilizzo questa variabile semplicemente per evitare di scrivere il tempo più volte. 
$time = 3600;
//Utilizzo INI SET per impostare una durata della sessione e del cookie 
ini_set('session.gc_maxlifetime',$time);
ini_set('session.cookie_lifetime',$time);

//Se non c'è alcuna sessione attiva, ne crea una ma se ce n'è già una allora la recupera. 
session_start();

$_SESSION['nome'] = "Michele";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Pagina 1</h1>
    <a href="./pagina2.php">Pagina 2</a>
    
</body>
</html>