<?php

namespace Models;

class Pizzeria{
    
    public $nome;
    public $descrizione;
    public $via;
    public $pizze;
    public $bevande;


    public function __construct(array $pizze, array $bevande) {
        $this->pizze = $pizze;
        $this->bevande = $bevande;
    }

    public function mostraPizze(){

        echo "<ul>";
        foreach($this->pizze as $pizza):    
            echo "<li>$pizza->gusto</li>";
        endforeach;
        echo "</ul>";
    }

}