<?php

class App{
    private $db;
    private $sql;
    private $rows;
    private $cityArr;

    public function __construct() {
        $this->connect();
        $this->setQuery();
        $this->executeQuery();
        $this->setCityUniqueArr();
    }

    private function connect(): void{
        $this->db = new PDO("mysql:host=localhost;dbname=esercizisql;","Michele","password");
    }

    private function isFilterActive():bool{
        $city = $_GET['city'] ?? "";
        return empty($city);
    }

    /**
     * Summary of setQuery
     * 
     * Questo metodo controlla se c'è tra i parametri get un query param chiamato city.
     * Se il suddetto query Param è presente, significa che l'utente ha richiesto di filtrare gli utenti per città, di conseguenza andrà ad impostare Nella variabile d'istanza $sql una query che comprende anche una istruzione where che procederà a filtrare gli utenti per città, In caso contrario, imposterà una query pulita che restituisce tutti gli utenti
     * 
     */
    private function setQuery(): void{
        $city = $_GET['city'] ?? "";
        if(!$this->isFilterActive()){
            $this->sql = "SELECT * FROM utenti";
        }else{
            $this->sql = "SELECT * FROM utenti WHERE citta = '$city'";
        }
    }

/**
 *
 * Metodo che esegue la query(definita al lancio di setQuery()), blocca il programma se la query va storta e salva nella variabile d'istanza $rows i risultati della query
 * 
 * */
    private function executeQuery(): void{
        global $db;//accedo a db che è globale
        $query = $db->query($this->sql);//Eseguo la query. 

        if(!$query) die("Impossibile caricare gli utenti");//Se qualcosa va storto blocco il programma 

        $this->rows = $query->fetchAll(PDO::FETCH_ASSOC);//Se la query è andata a buon fine, ne recupero i valori e li salvo nella variabile d'istanza. 
    }

    private function setCityUniqueArr(): void{
        //Avendo C'ha ottenuto i dati dal database (salvati nella prop $rows) Procedo a ciclarli e restituire la città di ogni utente. 
        $cityArr = array_map(function($u){
            return $u['citta'];
        },$this->rows);
    
    //Ora che ho a disposizione un array contenente tutte le città, vado a riordinarle in ordine alfabetico 
        sort($cityArr);
        //Siccome più utenti potrebbero essere assegnati alla stessa città, il mio array di città conterrà duplicati. Vado a rimuoverli grazie alla funzione array_unique
        $this->cityArr =  array_unique($cityArr);
    }

   
    private function renderCityFilter(): void{

?>


        <div class="alert alert-info">
                <form>

                    <select name="city" class="form-control">
                        <option value="">--Seleziona--</option>
                        <?php foreach($this->cityArr as $city):?>
                            <option value="<?=$city?>"><?=$city?></option>    
                        <?php endforeach;?>
                    </select>
                    <button class="btn btn-success">Filtra città</button>
                    <?php if($this->isFilterActive()):?>
                    <a href="?" class="btn btn-warning">Annulla filtro</a>
                    <?php endif;?>
                </form>
            </div>

        <?php
    }

     /**
     * 
     * Questo metodo viene chiamato per ultimo, quindi tutti i tutte le variabili di istanza saranno già valorizzate correttamente richiamare Questo metodo significa visualizzare la tabella dei risultati, il Form di ricerca e attivare tutto il funzionamento 
     * 
     */
    public function render(): void{
        ?>

            <h1>Lista utenti</h1>

            <?php $this->renderCityFilter(); ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>nome</th>
                        <th>età</th>
                        <th>Città</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($this->rows as $utente): 
                        [
                            "id" => $id,
                            "nome" => $nome,
                            "eta" => $eta,
                            "citta" => $citta,
                            "email" => $email
                        ] = $utente;
                        ?>
                    <tr>
                        <td><?=$id?></td>
                        <td><?=$nome?></td>
                        <td><?=$eta?></td>
                        <td><?=$citta?></td>
                        <td><?=$email?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

        <?php
    }


}