<?php

class Pizza{

    public $gusto;
    public $prezzo;

    public function __construct(string $gusto, int $prezzo){
        $this->gusto = $gusto;
        $this->prezzo = $prezzo;
        // $this->mostraInfo();//Se noto che ho bisogno sempre di invocare un determinato funzionamento, conviene che sia il costruttore ad occuparsi di invocare un metodo al posto dello sviluppatore 
    }

    public function mostraInfo(){
        //$this È una parola chiave contestuale che in questo caso si riferisce alla classe, ma che in realtà in fase distanziamento andrà ad essere un riferimento diretto all'oggetto che viene creato utilizzando la classe 
        echo "La pizza $this->gusto costa $this->prezzo euro<br>";
    }

}

$margherita = new Pizza('Margherita',5);
// $margherita->mostraInfo();//Se un metodo è pubblico, invece posso invocarlo da un'istanza della classe tutte le volte che voglio 

$diavola = new Pizza('Diavola',1);
// $diavola->mostraInfo();