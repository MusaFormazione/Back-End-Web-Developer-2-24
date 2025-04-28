<?php

require_once __DIR__ . '/../connection.php';
require_once __DIR__ . '/../../config.php';


//Verifico se il metodo usato è quello corretto 
if($_SERVER['REQUEST_METHOD'] !== 'POST') die('Metodo errato');

//Imposto una stringa vuota per tutti i dati mancanti. 
$nome = $_POST['nome'] ?? "";
$cognome = $_POST['cognome'] ?? "";
$email = $_POST['email'] ?? "";
$password = $_POST['password'] ?? "";

//Se c'è almeno una stringa vuota, allora rifiuto l'operazione 
if(empty($nome) || empty($cognome) || empty($email) || empty($password)) die('Tutti i campi devono essere compilati');

//Preparo l'hash della password in modo che venga salvata criptata. 
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

try{

    //Avvio una transazione in modo che, in caso di errore (Per esempio, utente già esistente) Le operazioni possono essere facilmente annullate 
    $db->beginTransaction();
    
    $sql = "INSERT INTO utenti (nome, cognome, email, password_hash) VALUE (:nome, :cognome, :email, :password_hash)";
    //uso prepare e bindParams per questioni di sicurezza
    $query = $db->prepare($sql);

    $query->bindParam(':nome',$nome);
    $query->bindParam(':cognome',$cognome);
    $query->bindParam(':email',$email);
    $query->bindParam(':password_hash',$passwordHash);

    $query->execute();

    //Se l'operazione va a buon fine, confermo l'operazione chiudendo la transazione
    $db->commit();

    header("Location: " . BASE_URL . "/register.php");

}catch(PDOException $e){

    if($db->inTransaction()){
        $db->rollBack();
    }
    
    if($e->errorInfo[1] == 1062){
        die("Utente già esistente");
    }
    
    die($e->getMessage());
    
}
