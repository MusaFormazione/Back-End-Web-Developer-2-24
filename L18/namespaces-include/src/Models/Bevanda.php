<?php

namespace Models;
class Bevanda{

    public $nome;
    protected $prezzo;
    protected $cl;

    public function __construct(string $nome, float $prezzo, float $cl) {
        $this->nome = $nome;
        $this->prezzo = $prezzo;
        $this->cl = $cl;
    }

    public function getPrezzo(): string {
        return $this->prezzo . '€';
    }

    public function getCl(): string {
        return $this->cl . 'cl';
    }
}