<?php

class Call{

    public function __call($methodName, $args){
        echo "Il metodo <b>$methodName</b> non esiste";
    }

}

$obj = new Call();

$obj->metodoInesistente();