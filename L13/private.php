<?php

class Genitore { 

    private $nome;
    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function getNomeGenitore(){
        return $this->nome;
    }

}

class Figlio extends Genitore{

    public function __construct($nome){
        parent::__construct($nome);

        echo $this->nome;
    }
}

$figlio = new Figlio('Mario');
echo "<pre>";
var_dump($figlio);
echo "</pre>";



