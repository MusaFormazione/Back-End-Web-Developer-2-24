<?php
include './parts/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Accedi</h1>

            <div class="alert alert-success"></div>
            <div class="alert alert-warning"></div>

            <form action="<?=BASE_URL?>/auth/main/user-login.php" method="POST">
                <input type="email" name="email" placeholder="La tua E-mail" class="form-control mb-3">

                <input type="password" name="password" placeholder="La tua password" class="form-control mb-3">

                <button class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

<?php include './parts/footer.php' ?>