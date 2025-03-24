<?php

try{

    $db = new PDO("mysql:host=localhost;dbname=test_creazione_db", "Michele", "password");

}catch(PDOException $e){

    echo "Error: " . $e->getMessage();

}