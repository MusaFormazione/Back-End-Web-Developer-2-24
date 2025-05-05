<?php

session_start();

require_once __DIR__ . '/../connection.php';
require_once __DIR__ . '/../../config.php';

try{

//Verifico se il metodo usato è quello corretto 
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    $_SESSION['error'] = true;
    $_SESSION['message'] = 'Errore nella richiesta';
    header("Location: ". BASE_URL. "/login.php");
    die;
}
//Imposto una stringa vuota per tutti i dati mancanti. 
$email = $_POST['email'] ?? "";
$password = $_POST['password'] ?? "";

//Se c'è almeno una stringa vuota, allora rifiuto l'operazione 
if(empty($email) || empty($password)){
    $_SESSION['error'] = true;
    $_SESSION['message'] = 'Compila i campi obbligatori';
    header("Location: ". BASE_URL. "/login.php");
    die;
}
    
    $sql = "SELECT * FROM utenti WHERE email = :email";
    $query = $db->prepare($sql);
    
    $query->bindParam(':email',$email);
    
    $query->execute();
    
    $utente = $query->fetch(PDO::FETCH_ASSOC);

    if(!$utente){
        $_SESSION['error'] = true;
        $_SESSION['message'] = "Utente non trovato";
        header("Location: " . BASE_URL . "/login.php");
        die;
    }


    if(!password_verify($password, $utente['password_hash'])) die('Password errata');
    
    unset($utente['password_hash']);
    $_SESSION['user'] = $utente;

    $_SESSION['message'] = "Accesso effettuato come {$utente['nome']}";
    header("Location: " . BASE_URL . "/rotte-protette/dashboard.php");
    die;

}catch(PDOException $e){

    $_SESSION['error'] = true;
    $_SESSION['message'] = $e->getMessage();
    header("Location: ". BASE_URL. "/login.php");

}