<?php

//Definisco un set di metodi e proprietà all'interno del contesto di un trait. 
//Queste potranno poi essere importate all'interno di classi.
//Il traito mi fa da raccoglitore e mi permette di iniettare metodi e proprietà all'interno di tutte le classi che voglio

trait FunzioniVeicolo{

    public $vel = 0;

    public function accelera():void{
        $this->vel++;
    }

    public function frena(){
        $this->vel--;
    }

}


class Bicicletta{
    use FunzioniVeicolo;
}

class AutoMobile{
    use FunzioniVeicolo;
}

$bici = new Bicicletta();
$auto = new AutoMobile();

$bici->accelera();
$auto->accelera();

echo "<pre>";
var_dump($bici);
echo "<hr>";
var_dump($auto);
echo "</pre>";