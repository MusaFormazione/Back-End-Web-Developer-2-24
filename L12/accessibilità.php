<?php

class Pizza{

    public $gusto;
    protected $prezzo;

    public function __construct(string $gusto, int $prezzo){
        $this->gusto = $gusto;
        $this->prezzo = $prezzo;
        $this->mostraInfo();
    }

    public function mostraPrezzo():void{
        $prezzoOutput = $this->prezzo * 1.04;
        echo $prezzoOutput . '€';
    }


    protected function mostraInfo(){
        echo "La pizza $this->gusto costa $this->prezzo euro<br>";
    }

}

$margherita = new Pizza('Margherita',10);

// echo $margherita->prezzo;//errore
// echo $margherita->mostraInfo();//errore
echo "<hr>";

$margherita->mostraPrezzo();