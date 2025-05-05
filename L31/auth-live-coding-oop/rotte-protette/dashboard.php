<?php
include '../parts/header.php';
$auth->requireLogin();
?>
<?php ErrorHelper::displayMessage() ?>
<div class="container">
    <div class="row">

        <div class="col-12">

            <h1>Dashboard</h1>

            <h2>I tuoi dati</h2>

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php $auth->loggedUserField('nome')?></li>
                <li class="list-group-item"><?php $auth->loggedUserField('cognome')?></li>
                <li class="list-group-item"><?php $auth->loggedUserField('email')?></li>
            </ul>

        </div>
    </div>
</div>

<?php include '../parts/footer.php' ?>