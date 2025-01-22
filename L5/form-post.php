<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- 
    action => Attributo che permette di definire a quale file verranno inviati i dati quando viene inviato il Form. Non provoca semplicemente l'invio dei dati, ma provoca lo spostamento dell'utente verso il file indicato 
    
    method => Solitamente ha valore get oppure post, Se non definito ha automaticamente un valore get. 

    method="get" => I valori presenti nel Form verranno se realizzati e aggiunti all'indirizzo della pagina di destinazione sotto forma di query params.
    Non utilizzarlo per dati sensibili, perché saranno visibili in chiaro 

    method="post" => I dati vengono inviati, come per una qualsiasi chiamata post. 

    -->

    <form action="form-post.php" method="POST">

        <input type="text" name="nome">

        <button>Invia</button>

    </form>

<pre>
<?php var_dump($_POST)  ?>
</pre>
    
</body>
</html>