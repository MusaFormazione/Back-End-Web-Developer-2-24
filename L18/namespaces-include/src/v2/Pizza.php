<?php

namespace V2;
class Pizza{

    public $gusto;
    protected $prezzo;
    public $calorie;
    
    public function __construct(string $gusto, float $prezzo, int $calorie) {
        $this->gusto = $gusto;
        $this->prezzo = $prezzo;
        $this->calorie = $calorie;
    }

    public function getPrezzo() {
        return $this->prezzo;
    }

}