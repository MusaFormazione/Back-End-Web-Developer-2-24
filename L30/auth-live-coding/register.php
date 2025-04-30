<?php
include './parts/header.php';
include BASE_PATH. '/auth/guards/guest-guard.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Registrati</h1>

            <?php include './parts/show-messages.php' ?>

            <form action="<?=BASE_URL?>/auth/main/register-new-user.php" method="POST">
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