<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

  include './scansione-cartella.php';
  echo "Cartella corrente:";
  leggiCartella(__DIR__);
  echo "Cartella \"Soluzione esercizio\":"; 
  leggiCartella(__DIR__ . "/soluzione-esercizio");

?>

</body>
</html>