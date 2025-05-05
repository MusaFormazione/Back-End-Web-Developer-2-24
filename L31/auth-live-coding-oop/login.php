<?php
include './parts/header.php';
$auth->requireGuest();
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Accedi</h1>

            <?php 

            //Verifico se il metodo usato è quello corretto 
            if($_SERVER['REQUEST_METHOD'] !== 'POST'){
                $_SESSION['error'] = true;
                $_SESSION['message'] = 'Errore nella richiesta';
                header("Location: ". BASE_URL. "/login.php");
                die;
            }
            //Imposto una stringa vuota per tutti i dati mancanti. 
            $email = $_POST['email'] ?? "";
            $password = $_POST['password'] ?? "";
                        
            
            ErrorHelper::displayMessage() 
            
            ?>

            <form method="POST">
                <input value="info@prova.it" type="email" name="email" placeholder="La tua E-mail" class="form-control mb-3">

                <input value="password" type="password" name="password" placeholder="La tua password" class="form-control mb-3">

                <button class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

<?php include './parts/footer.php' ?>