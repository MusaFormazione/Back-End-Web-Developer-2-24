<?php 
include "./includes/header.php"; 
require "./CRUD-files/read-by-id.php"; 


[
    "gusto" => $gusto,
    "prezzo" => $prezzo,
    "disponibile" => $disponibile
 ] = $pizza;

?>

<div class="container">
    <h1>Modifica la pizza</h1>

    <form action="CRUD-files/update.php?id=<?=$id?>" method="POST">

        <label for="gusto">Gusto</label>
        <input type="text" value="<?=$gusto?>" name="gusto" id="gusto" class="form-control">

        <label for="prezzo">Prezzo</label>
        <input type="number" value="<?=$prezzo?>" name="prezzo" id="prezzo" class="form-control">

        <label for="disponibile">Disponibile</label>
        <select name="disponibile" id="disponibile" class="form-control">
            <?php getDisponibileOption($disponibile) ?>
        </select>

        <button class="mt-3 btn btn-warning">Modifica</button>

    </form>
</div>

<?php include("./includes/footer.php") ?>