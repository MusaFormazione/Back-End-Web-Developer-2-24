<?php

interface iVeicolo{

    public function accelera():void;
    public function frena():void;

    public function getVelocità():int;

}

class Bici implements iVeicolo{
     
    private $vel = 0;
    
    public function accelera(): void{
        $this->vel++;
    }

    public function frena():void{
        $this->vel--;
    }

    public function getVelocità():int{
        return $this->vel;
    }

}

class Auto implements iVeicolo{
    private $vel = 0;
    
    public function accelera(): void{
        $this->vel += 20;
    }

    public function frena():void{
        $this->vel -= 20;
    }

    public function getVelocità():int{
        return $this->vel;
    }
}