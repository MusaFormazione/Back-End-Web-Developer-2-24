<?php
include './parts/header.php';
include BASE_PATH. '/auth/guards/guest-guard.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Accedi</h1>

            <?php include './parts/show-messages.php' ?>

            <form action="<?=BASE_URL?>/auth/main/user-login.php" method="POST">
                <input value="info@prova.it" type="email" name="email" placeholder="La tua E-mail" class="form-control mb-3">

                <input value="password" type="password" name="password" placeholder="La tua password" class="form-control mb-3">

                <button class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

<?php include './parts/footer.php' ?>