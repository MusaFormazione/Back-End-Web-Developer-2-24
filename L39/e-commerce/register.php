<?php include './parts/header.php';

$auth->requireGuest();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $auth->register($_POST);    

}

?>

<div class="container">

    <h1>Accedi</h1>

    <form method="POST">

        <input type="text" name="nome" class="form-control mb-3" placeholder="Nome">
        <input type="text" name="cognome" class="form-control mb-3" placeholder="Cognome">
        <input type="email" name="email" class="form-control mb-3" placeholder="Email">
        <input type="password" name="password" class="form-control mb-3" placeholder="Password">

        <button class="btn btn-primary">Iscriviti</button>
    </form>
    
</div>


<?php include './parts/footer.php' ?>