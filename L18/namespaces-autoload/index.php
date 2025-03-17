<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<pre>
    <?php

    require './vendor/autoload.php';
    
    use App\Models\Pizza;
    use App\Models\Bevanda;
    use App\Models\Pizzeria;
    use App\V2\Pizza as PizzaCalorie;
    
    $margherita = new Pizza('Margherita',5);
    $diavola = new App\Models\Pizza('Diavola',1);
    $capricciosa = new PizzaCalorie('Diavola',1, 1500);

    $cocaCola = new Bevanda('Coca Cola',3, 0.33);
    $redBull = new Bevanda('Red Bull',2.5, 0.33);

    $pizzeria = new Pizzeria([$margherita, $diavola], [$cocaCola, $redBull]);

    $pizzeria->nome = "Da Michele";
    $pizzeria->descrizione = "La miglior pizzeria della città";
    $pizzeria->via = "Via Roma 1";


    $pizzeria->mostraPizze();

    var_dump($pizzeria);

    ?>
</pre>

    
</body>
</html>