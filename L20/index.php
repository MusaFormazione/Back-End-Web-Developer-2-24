<?php require_once "connection.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php
    //Preparo i valori che inserirò nel database
    $nome = "Michele";
    $cognome = "Tedesco";
    $email = "esempio@esempio.it";

    //Preparo una riga di SQL contenente parametri che rappresentano uno schema della query SQL che verrà inviata al database. Utilizzo questo sistema anziché passare direttamente i valori delle variabili per questioni di sicurezza 
    $sql = "INSERT INTO utenti(nome, cognome, email) VALUES (:nome, :cognome, :email)";

    //Chiedo a PDO di elaborare la stringa SQL che ho appena creato. 
    $query = $db->prepare($sql);

    //Avvio la sostituzione dei parametri con i valori reali in maniera controllata e sicura grazie a PDO. 
    $query->bindParam(":nome",$nome, PDO::PARAM_STR);
    $query->bindParam(":cognome",$cognome, PDO::PARAM_STR);
    $query->bindParam(":email",$email, PDO::PARAM_STR);

    if($query->execute()){
        echo "Utente creato!";
    }else{
        echo $query->errorInfo();
    }

?>

<a href="users.php">Guarda json utenti</a>

</body>
</html>