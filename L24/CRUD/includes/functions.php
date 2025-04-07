<?php

require_once __DIR__ . '/config.php';

//todo: aggiungi un messaggio
function redirectToHome(string $message = "", bool $error = false): void{
    redirectTo("index.php", $message, $error);
}

function redirectTo(string $location, string $message = "", bool $error = false){
    $messageParam = $message ? "?message=$message" :  "";
    $errorParam = $error ? "&error=1" :  "";
    header("Location: " . BASE_URL . "{$location}{$messageParam}{$errorParam}");
    die;
}


function hasSuccessMessage():bool{
    return isset($_GET['message']) && !isset($_GET['error']);
}

function hasErrorMessage():bool{
    return isset($_GET['message']) && isset($_GET['error']);
}


/**
 * 
 * @param string[] $names
 * @return array
 * 
 * 
 * Funzione utilizzata per verificare l'esistenza e il. Il valore dei dati inviati via method POST da un form 
 * Richiede una lista di stringhe da ricercare come chiave all'interno delL'array post 
 * 
 * In caso di successo restituisce i dati Controllati 
 * 
 * In caso di dati assenti o vuoti crea un redirect alla home con un messaggio di errore 
 * 
 */
function getCheckedData(string ...$names):array{

    $checkedData = [];

    foreach($names as $name){
        if(isset($_POST[$name]) && !empty($_POST[$name])){
            $checkedData[$name] = $_POST[$name];
        }else{
            redirectToHome("Tutti i campi devono essere compilati", true);
        }
    }

    return $checkedData;
}