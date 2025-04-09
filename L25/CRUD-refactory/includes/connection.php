<?php

try{

    $db = new PDO("mysql:host=localhost;dbname=crud_pizze","Michele","password");

}catch(PDOException $e){

    die($e->getMessage());
    
}