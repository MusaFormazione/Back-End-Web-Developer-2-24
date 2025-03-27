<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="POST">
        <textarea name="frase"></textarea>
        <button>Conta le parole</button>
    </form>

<?php if($_SERVER["REQUEST_METHOD"] == "POST"):
    
    $frase = $_POST["frase"] ?? "";

    if(empty($frase)) die('Frase mancante');

    function getNumeroParole(string $frase):int{

        $arrayParole = explode(" ", $frase);
        
        return count($arrayParole);
    }


    ?>
    
    <h3>Frase inserita:</h3>
    <p><?=$frase?></p>
    <h3>Numero Parole:</h3>
    <p><?=getNumeroParole($frase)?></p>

<?php endif; ?>

    
</body>
</html>