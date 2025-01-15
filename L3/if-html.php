<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form>
        <input type="number" required name="anni" placeholder="Quanti anni hai?">
        <button>Invia</button>
    </form>

<?php 

    $anni = $_GET['anni'] ?? 0;

    if($anni >= 18 && $anni <= 120): ?>

    <h2>Sei Maggiorenne</h2>

<?php elseif($anni > 120): ?>

    <h2>Sei Antico</h2>

<?php else: ?>

    <h2>Sei Minorenne</h2>

<?php endif; ?>

</body>
</html>