<?php

class QueryHandler{

    private $db;

    public function __construct() {
        $this->connect();
    }

    protected function connect(){
        try{

            $this->db = new PDO("mysql:host=localhost;dbname=crud_pizze","Michele","password");
        
        }catch(PDOException $e){
        
            die($e->getMessage());
            
        }
    }

    public function getAll(string $table, string $orderBy): array{
        $sql = "SELECT * FROM $table ORDER BY $orderBy ASC";

        $query = $this->db->query($sql);

        if(!$query) {
            //gestisci errore con un messaggio
            die();
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}