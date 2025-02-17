<?php

class Pizza{

    public $gusto;
    public $prezzo;

    public function __construct(string $gusto, int $prezzo){
        $this->gusto = $gusto;
        $this->prezzo = $prezzo;
    }

}

$margherita = new Pizza('Margherita',5);
echo "<pre>";
var_dump($margherita);
echo "</pre>";


echo "Gusto della pizza: $margherita->gusto<br>";

echo "Prezzo della pizza $margherita->gusto: $margherita->prezzo<br>";

$margherita->prezzo = 6;

echo "Prezzo aggiornato della pizza $margherita->gusto: $margherita->prezzo";
