<?php
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<!-- Esercizio in sospeso, lo finiamo alla prossima lezione -->
    <?php

    $dbPizze = [
        [
            "id" => 20,
            "gusto" => "Margherita",
            "prezzo" => 5
        ],
        [
            "id" => 38,
            "gusto" => "Diavola",
            "prezzo" => 1
        ],
        [
            "id" => 56,
            "gusto" => 'Marinara',
            "prezzo" => 4
        ],
        [
            "id" => 86,
            "gusto" => 'Capricciosa',
            "prezzo" => 8
        ]
    ];

    ?>

    <form method="POST">
        <label for="pizza">Scegli una pizza</label>
        <select name="pizza" id="pizza">
            <?php createPizzaOptionTags($dbPizze) ?>
        </select>
        <button>Mostra prezzo</button>
    </form>

    <div>
        <?php showPizzaIfFound() ?>
    </div>

</body>

</html>