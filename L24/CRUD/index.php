<?php include("./includes/header.php") ?>
<?php include("./includes/CRUD-files/read.php") ?>

<div class="container">
    <h1>Lista pizze</h1>

    <table class="table">
        <thead>

            <tr>
                <th>#</th>
                <th>Gusto</th>
                <th>Prezzo</th>
                <th>Disponibile?</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $pizza):
                
                [
                    "id" => $id,
                    "gusto" => $gusto,
                    "prezzo" => $prezzo,
                    "disponibile" => $disponibile
                 ] = $pizza;

                ?>
                <tr>
                    <td><?=$id?></td>
                    <td><?=$gusto?></td>
                    <td><?=$prezzo . "€"?></td>
                    <td><?=$disponibile ? "si" : "no"?></td>
                    <td>
                        <a class="btn btn-warning" href="./edit-form.php?id=<?=$id?>">Modifica</a>
                        <a class="btn btn-danger" href="./includes/CRUD-files/delete.php?id=<?=$id?>">Elimina</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

<?php include("./includes/footer.php") ?>