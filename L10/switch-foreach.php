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
            <?php foreach ($dbPizze as $singolaPizza): ?>
                <option value="<?= $singolaPizza['id'] ?>"><?= $singolaPizza['gusto'] ?></option>
            <?php endforeach; ?>
        </select>
        <button>Mostra prezzo</button>
    </form>

    <?php

    //Verifico se è stata ricevuta una richiesta di tipo post 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        
        $pizzaId = $_POST['pizza'] ?? '';

        foreach($dbPizze as $singolaPizza){
            $pizza = $singolaPizza['id'] == $pizzaId;
        }

        if (!empty($pizza)) {

            switch ($pizza) {

                case 20:
                    echo "La pizza {$pizza['gusto']} costa {$pizza['prezzo']}€";
                    break;
                case 38:
                    echo "La pizza {$pizza['gusto']} costa {$pizza['prezzo']}€";
                    break;
                case 56:
                    echo "La pizza {$pizza['gusto']} costa {$pizza['prezzo']}€";
                    break;
                case 86:
                    echo "La pizza {$pizza['gusto']} costa {$pizza['prezzo']}€";
                    break;
                default:
                    echo "La pizza non è disponibile";

            }

        }
    }
    ?>

</body>

</html>