<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST">

        <input type="text" name="nome" placeholder="Nome">
        <input type="email" name="email" placeholder="Email">
        <input type="number" name="anni" placeholder="Anni">
        <button>Invia</button>

    </form>

    <?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $anni = $_POST['anni'] ?? '';

        if(empty($nome) || empty($email)){
            echo "<h3>Alcuni dati sono mancanti.</h3>
            <p>Dati inseriti:</p>
            Nome: $nome<br>
            Email: $email";
        }else{
            echo "<p>Nome ed e-mail ricevuti con successo</p>";
        }

        if(!empty($anni)){
            if($anni < 0){
                echo "<p>L'età non può essere negativa</p>";
            }else{
                echo "<p>Età valida</p>";
            }
        }else{
           echo "<p>Età non ricevuta</p>";
        }




    }
    
    ?>

</body>
</html>