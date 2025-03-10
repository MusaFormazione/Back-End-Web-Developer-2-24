<?php

abstract class Veicolo{

    public $vel = 0;
    public $maxVel;
    public $nRuote;

    public function __construct(int $maxVel, int $nRuote){
        $this->maxVel = $maxVel;
        $this->nRuote = $nRuote;
    }

    public abstract function accelera():void;

    public abstract function frena():void;

    public function getVel():int{
        return $this->vel;
    }
}

// $v = new Veicolo();//Cannot instantiate abstract class 'Veicolo'
//Non è fatta per essere istanziata, ma per essere usata come punto iniziale da cui estendere nuove classi 

class Bicicletta extends Veicolo{

    public function __construct(int $maxVel = 40){
        parent::__construct($maxVel, 2);
    }

    public function accelera(): void{
        $this->vel++;
    }

    public function frena(): void{
        $this->vel--;
    }

    public function haRotelle(bool $rotelle){
        $this->nRuote = $rotelle ? 4 : 2;
    }

}

$bici = new Bicicletta();

$bici->haRotelle(true);

$bici->accelera();

echo "La velocità di movimento della bici è attualmente pari a {$bici->getVel()}";

echo "<pre>";
var_dump($bici);
echo "</pre>";


class Automobile extends Veicolo{

    public $nPorte;

    public function __construct(int $maxVel, int $nPorte){
        parent::__construct($maxVel, 4);
        $this->nPorte = $nPorte;
    }

    public function accelera(): void{
        if($this->vel + 20 > $this->maxVel) return;//blocca l'esecuzione del metodo
            
        $this->vel += 20;
    }

    public function frena(): void{
        if($this->vel - 20 < 0) return;//blocca l'esecuzione del metodo

        $this->vel -= 20;
    }
}

$fiat500 = new Automobile(150, 3);
$mini = new Automobile(180, 3);


$fiat500->accelera();//20
$fiat500->accelera();//40
$fiat500->accelera();//60

$fiat500->frena();//40

echo "<pre>";
var_dump($fiat500);
echo "<hr>";
var_dump($mini);
echo "</pre>";