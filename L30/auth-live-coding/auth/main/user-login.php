<?php

session_start();

require_once __DIR__ . '/../connection.php';

try{

//Verifico se il metodo usato è quello corretto 
if($_SERVER['REQUEST_METHOD'] !== 'POST') die('Metodo errato');

//Imposto una stringa vuota per tutti i dati mancanti. 
$email = $_POST['email'] ?? "";
$password = $_POST['password'] ?? "";

//Se c'è almeno una stringa vuota, allora rifiuto l'operazione 
if(empty($email) || empty($password)) die('Tutti i campi devono essere compilati');
    
    $sql = "SELECT * FROM utenti WHERE email = :email";
    $query = $db->prepare($sql);
    
    $query->bindParam(':email',$email);
    
    $query->execute();
    
    $utente = $query->fetch();


    if(!password_verify($password, $utente['password_hash'])) die('Password errata');

    echo "Accesso effettuato";

    $_SESSION['user'] = $utente;

}catch(PDOException $e){

    die($e->getMessage());

}