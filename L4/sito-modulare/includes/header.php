<?php $valoreEsportato = require_once __DIR__ . '/function.php';

echo $valoreEsportato;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
            <?php include __DIR__ . '/nav.php'; ?>
        </ul>
    </header>
    <main>