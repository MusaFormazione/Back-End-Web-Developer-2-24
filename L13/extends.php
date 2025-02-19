<?php

class Genitore { 

    public $nome;
    public $cognome = 'Rossi';
    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function saluto(): string{
        return "Ciao, sono $this->nome $this->cognome";
    }

}

$genitore = new Genitore('Mario');

// var_dump($genitore);

echo $genitore->saluto() . '<br>';


class Figlio extends Genitore{
    public $anni;

    public function __construct($nome, $anni){
        parent::__construct($nome);
        $this->anni = $anni;
    }

    public function saluto(): string{
        return parent::saluto() . ", ed ho $this->anni anni";
    }

    public function salutoFiglio(){
        return "Ciao, sono $this->nome $this->cognome, ed ho $this->anni anni<br>";
    }
}

$figlio = new Figlio('Giovanna',30);

echo $figlio->saluto() . '<br>';
echo $figlio->salutoFiglio() . '<br>';

var_dump($figlio);
