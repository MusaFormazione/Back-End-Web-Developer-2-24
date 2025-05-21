<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <h1>Compila il form per contattarci</h1>
    <form action="send_mail" method="POST">
        
        <input class="form-control mb-3" type="text" placeholder="Scrivi il tuo nome" name="name" required>
        <input class="form-control mb-3" type="text" placeholder="Scrivi la tua email" name="email" required>
        <label for="message">Message:</label>
        <textarea class="form-control" name="message" id="message"></textarea>
        
        <button class="btn btn-primary">Invia</button>
    </form>
    
</div>
</body>
</html>