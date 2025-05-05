<?php
include '../parts/header.php';
include BASE_PATH. '/auth/guards/auth-guard.php';
?>
<?php include '../parts/show-messages.php' ?>
<div class="container">
    <div class="row">

        <div class="col-12">

            <h1>Dashboard</h1>

            <h2>I tuoi dati</h2>

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?=$_SESSION['user']['nome']?></li>
                <li class="list-group-item"><?=$_SESSION['user']['cognome']?></li>
                <li class="list-group-item"><?=$_SESSION['user']['email']?></li>
            </ul>

        </div>
    </div>
</div>

<?php include '../parts/footer.php' ?>