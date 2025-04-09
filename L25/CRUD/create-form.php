<?php include("./includes/header.php") ?>

<div class="container">
    <h1>Crea una pizza</h1>

    <form action="includes/CRUD-files/create.php" method="POST">

        <label for="gusto">Gusto</label>
        <input type="text" name="gusto" id="gusto" class="form-control">

        <label for="prezzo">Prezzo</label>
        <input type="number" name="prezzo" id="prezzo" class="form-control">

        <label for="disponibile">Disponibile</label>
        <select name="disponibile" id="disponibile" class="form-control">
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>

        <button class="mt-3 btn btn-primary">Salva</button>

    </form>

</div>

<?php include("./includes/footer.php") ?>