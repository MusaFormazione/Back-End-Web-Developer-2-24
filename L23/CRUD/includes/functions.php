<?php

//todo: aggiungi un messaggio
function redirectToHome(string $message = "", bool $error = false): void{
    redirectTo("index.php", $message, $error);
}

function redirectTo(string $location, string $message = "", bool $error = false){
    $messageParam = $message ? "?message=$message" :  "";
    $errorParam = $error ? "&error=1" :  "";
    header("Location: {$location}{$messageParam}{$errorParam}");
    die;
}