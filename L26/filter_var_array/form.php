<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h1>Testa i dati</h1>
        
        <form action="filter_var_array.php" method="POST">
            
            <input type="text" name="nome" placeholder="Nome" class="form-control mb-3">

            <input type="text" name="cognome" placeholder="Cognome" class="form-control mb-3">

            <input type="email" name="email" placeholder="E-Mail" class="form-control mb-3">

            <input type="number" name="anni" placeholder="Anni" class="form-control mb-3">

            <button class="btn btn-primary">Invia</button>
            
        </form>
        
    </div>
</body>
</html>