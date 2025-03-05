<?php


class Prodotto{

    protected $nome;
    protected $prezzo;

    public function __construct(string $nome, int|float $prezzo){
        $this->nome = $nome;
        $this->prezzo = $prezzo;
    }

    public function setPrezzo(int|float $prezzo): void{
        if($prezzo < 0) return;

        $this->prezzo = $prezzo;
    }

    public function getPrezzo():string {
        $conIva = $this->prezzo * 1.22;
        return $conIva . '€';
    }

}


$smartphone = new Prodotto('Samsung Galaxy S10 5G', 500);

echo $smartphone->getPrezzo();