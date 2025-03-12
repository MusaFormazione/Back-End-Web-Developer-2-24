<?php require_once 'lang-switch.php'; ?>
<!DOCTYPE html>
<html lang="<?=$lang?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="d-flex justify-content-center py-3">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <?php include 'nav.php'?>
                </div>
                <div class="col">
                    <!-- Siccome non ho dichiarato action verrà ricaricata la pagina in cui mi trovo adesso all'invio del Form. 
                     Siccome non ho dichiarato un method, allora i dati vengono inviati automaticamente in get.  -->
                    <form>
                        <select name="lang" class="form-control">
                            <?=createLangFields() ?>
                        </select>
                        <button class="btn btn-info"><?=STRINGS['buttons']['lang-switch']?></button>
                    </form>
                </div>
            </div>
        </div>


    </header>