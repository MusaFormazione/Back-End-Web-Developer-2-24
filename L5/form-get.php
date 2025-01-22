<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <!-- 
    action => Se non definito il Form invia automaticamente i dati all'attuale pagina


    method="get" => Se l'attributo matmhitod non è neanche stato definito allora verrà considerato in automatico un method="get". 

    -->

    <form action="form-get.php" method="GET">

        <input type="text" name="nome">

        <button>Invia</button>

    </form>

<pre>

<a href="form-get.php?id=4">Clicca qui per inviare un dato in get alla pagina attuale</a>


<?php var_dump($_GET)  ?>
</pre>
    
</body>
</html>