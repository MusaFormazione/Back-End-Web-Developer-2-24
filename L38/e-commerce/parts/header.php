<?php

include __DIR__ . '/../functions.php';
include __DIR__ . '/../classes/Auth.php';

$auth = new Auth('/login.php', '/register.php', '/user-account/orders.php');

if(isset($_GET['logout'])){
    $auth->logout(BASE_URL . '/login.php');
}


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
                <a href="<?=BASE_URL?>/login.php" class="btn btn-outline-primary me-2">Login</a>
                <a href="<?=BASE_URL?>/register.php" class="btn btn-primary">Sign-up</a>
            <?php endif; ?>
            <?php if ($auth->isLoggedIn()): ?>
                <a href="<?=BASE_URL?>/?logout=1" class="btn btn-outline-warning me-2">Logout</a>
            <?php endif; ?>
        </div>
    </header>

    <?php
    
    ErrorHelper::displayMessage()
    ?>