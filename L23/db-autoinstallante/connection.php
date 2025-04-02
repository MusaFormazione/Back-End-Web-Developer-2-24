<?php

try{

$db = new PDO("mysql:host=localhost;dbname=esercizio-creazione-tabelle", "Michele", "password");

}catch(PDOException $e){
    die("Errore: " . $e->getMessage());
}