<?php

try{

    $db = new PDO('mysql:dbname=eseercizio_paginazione_2_24;host=localhost',"Michele","password");

}catch(PDOException $e){
    die($e->getMessage());
}