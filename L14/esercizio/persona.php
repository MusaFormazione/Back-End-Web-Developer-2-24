<?php

class Persona{
    public $nome;
    public $cognome;

    public function __construct(string $nome, string $cognome){
        $this->nome = $nome;
        $this->cognome = $cognome;
    }

    public function saluto(): void{
        echo "Ciao, mi chiamo $this->nome $this->cognome";
    }

}


class Docente extends Persona{

    public $skills;

    public function __construct(string $nome, string $cognome, array $skills = []){
        parent::__construct($nome, $cognome);
        $this->skills = $skills;
    }

    /**
     * Ipotesi numero 1 
     * Evito di sovrascrivere il metodo saluto e ne creo uno nuovo specifico della classe attuale
     * In questo modo, però, il vecchio metodo saluto continua ad esistere e potrebbe generare confusione.   
     */
    public function salutoDocente(): void{
        $skillsString = implode(", ", $this->skills);
        echo "Ciao, mi chiamo $this->nome $this->cognome ed insegno le seguenti materie: $skillsString";
    }

    /**
     *Ipotesi numero 2 
     *Sovrascrivo il metodo saluto e ridefinisco tutto il suo funzionamento, dato che quello originale non restituisce la stringa, ma la mostra direttamente.  
     */
     public function saluto(): void{
        $skillsString = implode(", ", $this->skills);
        echo "Ciao, mi chiamo $this->nome $this->cognome ed insegno le seguenti materie: $skillsString";
     }

}

class Studente extends Persona{

    /**
     * Siccome la proprietà $materie viene gestita da un metodo, abbiamo deciso di impostarlo come protected. 
     * Dato che non è una proprietà inserita a livello del costruttore, procediamo a fornire come valore di default un array vuoto per evitare errori in fase di utilizzo di questa proprietà. 
    */
    protected $materie = [];

    public function __construct(string $nome, string $cognome){
        parent::__construct($nome, $cognome);
    }

    /**
     * "Trucchetto" per snellire il costruttore:
     * Quando il costruttore ha molti parametri, potrebbe risultare complesso l'utilizzo e la lettura di quest'ultimo. Di conseguenza potresti pensare di creare metodi aggiuntivi che si occupano di valorizzare alcune proprietà.
     * Tieni presente che non tutte le proprietà devono per forza essere passate come parametro a livello del costruttore. Questo ti permetterà di avere codice più organizzato e più facile da gestire. 
     */
    public function setMaterie(array $materie){
        //Dato che le materie saranno un redistringer e quindi potrebbero occupare molto spazio nel codice Abbiamo preparato un metodo apposito che ci permette di inserire le materie dopo aver inizializzato l'oggetto 
        $this->materie = $materie;
    }

    public function saluto(): void{
        $materieString = implode(", ", $this->materie);
        echo "Ciao, mi chiamo $this->nome $this->cognome ed studio le seguenti materie: $materieString";
     }

}

$docente = new Docente('Michele Arcangelo','Tedesco',['PHP','Laravel']);

$studente = new Studente('Francesco','M');
$studente->setMaterie(['JS', 'PHP']);


$docente->salutoDocente();
echo '<br>';
$docente->saluto();
echo '<br>';
$studente->saluto();