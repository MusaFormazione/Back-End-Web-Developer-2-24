<?php
session_start();
require_once __DIR__ . '/../config.php';
define('IS_LOGGED_IN', isset($_SESSION['user']));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>

    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <?php include __DIR__ . '/nav.php' ?>
        </ul>

        <div class="col-md-4 text-end">
            <?php if(IS_LOGGED_IN){
                echo "Benvenuto/a ". $_SESSION['user']['nome'];
            } ?>
        </div>
        <div class="col-md-3 text-end">
            <?php include __DIR__ . '/auth-nav.php' ?>
        </div>
    </header>