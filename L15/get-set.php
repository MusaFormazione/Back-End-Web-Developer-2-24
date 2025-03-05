<?php


class Prodotto{
    protected $nome;
    protected $prezzo;
    public function __construct(string $nome, int|float $prezzo){
        $this->nome = $nome;
        $this->prezzo = $prezzo;
    }

    public function __set($property, $value){

        //Potrebbe essere stata richiamata una proprietà che non esiste, quindi è necessario controllare la sua esistenza ed in caso contrario lanciare un'eccezione 
        if(property_exists($this, $property)){

            $this->checkName($property, $value);
            $this->checkPrice($property, $value);

        }else{
            throw new Exception("La proprietà $property non esiste");
        }
    }

    protected function checkPrice($property, $value){
        if($property === 'prezzo'){
            if($value < 0) throw new Exception('Il prezzo non può essere negativo');

            $this->prezzo = $value;
        }
    }

    protected function checkName($property, $value){
        if($property === 'nome'){
            if(strlen($value) <= 2) throw new Exception('Il Nome è troppo breve');

            $this->nome = $value;
        }
    }


    public function __get($property){

        if(property_exists($this, $property)){

            $this->getPrice($property);

            if($property === 'nome'){
                return  ucfirst($this->$property);
            }
            
        }else{
            throw new Exception("La proprietà $property non esiste");
        }
    }

    protected function getPrice($property){
        if($property === 'prezzo'){
            $conIva = $property * 1.22;
            return $conIva;
        }
    }

}

$smartphone = new Prodotto('samsung galaxy S10 5G', 500);

try{

    //prove per __set
    // $smartphone->nome = 'Iphone X';
    // $smartphone->nomeeeeeeeee = 'Iphone X';//La proprietà nomeeeeeeeee non esiste
    // $smartphone->nome = 'a';Il Nome è troppo breve
    // $smartphone->prezzo = -1;Il prezzo non può essere negativo


    //prove per __get
    echo $smartphone->nome;
    
}catch(Exception $e){
    echo $e->getMessage();
}

