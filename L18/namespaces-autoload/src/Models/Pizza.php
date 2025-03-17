<?php

namespace App\Models;
class Pizza{

    public $gusto;
    protected $prezzo;
    
    public function __construct(string $gusto, float $prezzo) {
        $this->gusto = $gusto;
        $this->prezzo = $prezzo;
    }

    public function getPrezzo() {
        return $this->prezzo;
    }

}