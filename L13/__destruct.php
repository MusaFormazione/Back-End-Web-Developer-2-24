<?php


class Distruzione{

    public function __destruct(){
        echo "Metodo distrutto";
    }

}


$obj = new Distruzione();

unset($obj);