<?php include __DIR__ . '/includes/variabili.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$titolo?></title>
</head>
<body style="background-color: <?=$backgroundColor?>;">
    
    <h1><?=$titolo?></h1>

    <p>Numero generato randomicamente: <?=getRandomNumber()?></p>
    <p>Il file attuale si trova nella cartella: <?=__DIR__?></p>
    <p>Il file attuale è: <?=__FILE__?></p>
</body>
</html>