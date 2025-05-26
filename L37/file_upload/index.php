<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Caricamento immagini</h1>
    
    <form action="upload-files.php" method="POST" enctype="multipart/form-data">

        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="<?=2 * 1024 * 1024?>"> -->
        <label for="image">Scegli un'immagine</label>
        <input type="file" id="image" name="image">

        <button>Carica</button>

    </form>

</body>
</html>