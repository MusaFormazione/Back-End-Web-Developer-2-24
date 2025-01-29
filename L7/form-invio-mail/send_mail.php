<?php

// var_dump($_POST);

function backToForm(){
    //redirect a index.php
    header('Location: index.php');
    //Termino l'esecuzione dello script 
    die;
    
}

//Controllo se si visita questa pagina da una richiesta POST
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    //In caso non ci sia in atto una richiesta di tipo post, rimando l'utente all'index con questo redirect. 
    backToForm();
}

//Controllo che siano stati inviati tutti i campi 
if(!isset($_POST['nome']) || !isset($_POST['email']) || !isset($_POST['oggetto']) || !isset($_POST['messaggio']) ){
    backToForm();
}

[
    'nome' => $nome, 
    'email' => $email, 
    'oggetto' => $oggetto, 
    'messaggio' => $messaggio
] = $_POST;

//Visto che i campi ci sono, procedo a controllare se non sono stati lasciati vuoti 
if(empty($nome) || empty($email) || empty($oggetto) || empty($messaggio) ){
    backToForm();
} 

//Se siamo arrivati fin qua vuol dire che c'è una richiesta post contenente tutti i campi e questi campi hanno i rispettivi valori 


$to = 'miamail@miodominio.it';
$messaggio = "
    <h1>Hai ricevuto un messaggio dal sito</h1>
    <p>Mittente: $nome</p>
    <p>E-mail mittente: $email</p>
    <div>Messaggio: $messaggio</div>
";
$headers = "From: info@miosito.it" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
$headers .= "Reply-to: $email" . "\r\n";
$headers .= "CC: altrapersona@esempio.it" . "\r\n";

if(mail($to, $oggetto, $messaggio, $headers)){
    echo 'Messaggio inviato con successo';
}else{
    echo 'Messaggio non inviato';
}
