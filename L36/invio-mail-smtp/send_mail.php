<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function redirectOnError(string $text):never{
    header("Location: ./index.php");
    die($text);
}

if($_SERVER['REQUEST_METHOD'] !== 'post'){
    header("Location: ./index.php");
    die();
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if(empty($name) || empty($email) || empty($message)) redirectOnError('Compila i campi obbligatori');

$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$message = htmlspecialchars($message);

$mail = new PHPMailer(true);

try{

    //configurazione del server SMTP
    $mail->isSMTP();//attiva la configurazione SMTP
    $mail->Host = "gnldm1022.siteground.biz";//indirizzo del server SMTP
    $mail->SMTPAuth = true;//Dichiaro che il mio server SMTP utilizza l'autenticazione 
    $mail->Username = "info@captain-edward.tech";//Lo username SMTP non è altro che l'indirizzo email
    $mail->Password = '$54z_fq2~G1#';//Password per accedere alla casella di posta
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Utilizzo un protocollo sicuro e vado a criptare la richiesta SSL/TLS
    $mail->Port = 465;

    //Informazioni su mittente e destinatario
    $mail->setFrom("info@captain-edward.tech","Nome del mio Sito Web");//Email del mittente, Se si vuole si può fornire anche il nome del mittente (Come secondo argomento)
    $mail->addAddress('ricezione@captain-edward.tech');//email del destinatario

    //contenuto dell'email
    $mail->isHTML();//Il contenuto dell'e-mail ora accetta l'HTML
    $mail->Subject = "Il tuo ordine è stato spedito";//Questo è l'oggetto dell'email 
    
    //Ora vado a scrivere il contenuto dell'email. 
    $mail->Body = "
        <h1>Nuovo Messaggio: </h1>
        <p><b>Nome: </b>$name</p>
        <p><b>Email: </b>$email</p>
        <p><b>Message: </b>$message</p>
    ";

    $mail->AltBody = "Nome: $name\nEmail: $email\nMessaggio: $message";//Contenuto alternativo per i clienti mail che non supportano l'HTML

    //Invia l'email 
    $mail->send();
    echo "Email inviata con successo;";

}catch(Exception $e){

    echo "Errore nell'invio del messaggio {$mail->ErrorInfo}";

}