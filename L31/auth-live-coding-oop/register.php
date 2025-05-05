<?php
include './parts/header.php';
$auth->requireGuest();
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Registrati</h1>

            <?php

                //Verifico se il metodo usato è quello corretto 
                if($_SERVER['REQUEST_METHOD'] !== 'POST'){
                    ErrorHelper::setSessionError('Richiesta non valida');
                }

                $auth->register($POST);

            ?>

            <?php ErrorHelper::displayMessage() ?>

            <form method="POST">
                <input type="text" name="nome" placeholder="Nome" class="form-control mb-3">

                <input type="text" name="cognome" placeholder="Cognome" class="form-control mb-3">

                <input type="email" name="email" placeholder="La tua E-mail" class="form-control mb-3">

                <input type="password" name="password" placeholder="La tua password" class="form-control mb-3">

                <button class="btn btn-primary">Registrati</button>
            </form>
        </div>
    </div>
</div>

<?php include './parts/footer.php' ?>