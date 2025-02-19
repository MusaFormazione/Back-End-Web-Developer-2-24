<?php

class UnsetMagico{

    public function __unset($name){
        echo "Non puoi eliminare la proprietà <b>$name</b> perché non esiste";
    }

}


$obj = new UnsetMagico();

unset($obj->pippo);