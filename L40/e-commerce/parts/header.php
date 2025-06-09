<?php
//Inizializza la sessione che mi servirà per gestire il carrello e l'autenticazione 
session_start();
//Creo la voce Cart all'interno della sessione e la inizializzo con un valore array in modo che il nostro sistema sia pronto all'aggiunta di nuovi Prodotti all'interno del carrello 
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

//Include il sistema di autenticazione e tutto quello che ne consegue 
include __DIR__ . '/../classes/Auth.php';
include __DIR__ . '/../functions.php';

//Questa variabile sarà quella con cui ci interfacciamo tutto, tutte le volte che dobbiamo avere a che fare con l'autenticazione 
$auth = new Auth('/login.php', '/register.php', '/user-account/orders.php');

//Gestisco le richieste di logout 
if(isset($_GET['logout'])){
    $auth->logout(BASE_URL . '/login.php');
}

//Gestisco le richieste di aggiunta al carrello 
if(isset($_GET['add_to_cart'])){
    addToCart($_GET['add_to_cart']);
}

// var_dump($_SESSION['cart']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>


    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <?php include __DIR__ . '/nav.php' ?>
        </ul>
        <div class="col-md-3 text-end">
            <?php if (!$auth->isLoggedIn()): ?>
                <a href="<?=LOGIN_URL?>" class="btn btn-outline-primary me-2">Login</a>
                <a href="<?=REGISTER_URL?>" class="btn btn-primary">Sign-up</a>
            <?php endif; ?>
            <?php if ($auth->isLoggedIn()): ?>
                <a href="<?=BASE_URL?>/?logout=1" class="btn btn-outline-warning me-2">Logout</a>
            <?php endif; ?>
        </div>
    </header>

    <?php
    
    ErrorHelper::displayMessage()
    ?>