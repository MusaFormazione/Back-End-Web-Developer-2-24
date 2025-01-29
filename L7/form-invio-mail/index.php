<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    
<div class="container">

<h1>Invia un'email</h1>
    <form action="send_mail.php" method="POST">
        <label for="nome">nome</label>
        <input type="text" name="nome" id="nome" class="form-control">

        <label for="email">email</label>
        <input type="email" name="email" id="email" class="form-control">

        <label for="oggetto">oggetto</label>
        <input type="text" name="oggetto" id="oggetto" class="form-control">

        <label for="messaggio">messaggio</label>
        <textarea name="messaggio" id="messaggio" class="form-control"></textarea>
        
        <button class="btn btn-primary mt-3">Invia</button>
    </form>
    
</div>
</body>
</html>