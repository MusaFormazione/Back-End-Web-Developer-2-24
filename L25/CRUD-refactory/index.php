<?php include("./includes/header.php") ?>
<?php require_once __DIR__ . "/../utils/QueryHandler.php";

$qh = new QueryHandler();
$pizze = $qh->getAll('pizze','gusto'); ?>

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
            <?php foreach($pizze as $pizza):
                
                [
                    "id" => $id,
                    "gusto" => $gusto,
                    "prezzo" => $prezzo,
                    "disponibile" => $disponibile
                 ] = $pizza;

                 $disponibileClass = !$disponibile ? "alert-danger" : "alert-success";

                ?>
                <tr>
                    <td><?=$id?></td>
                    <td><?=$gusto?></td>
                    <td><?=$prezzo . "€"?></td>
                    <td> 
                        <div class="alert <?=$disponibileClass?>">
                            <?=$disponibile ? "si" : "no"?>
                        </div>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="./edit-form.php?id=<?=$id?>">Modifica</a>
                        <a class="eliminaBtn btn btn-danger" href="./confirm-delete.php?id=<?=$id?>">Elimina</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

<script>
//Chiedo conferma della volontà di eliminare una pizza utilizzando javascript Decommentare questo codice per testare 
// const eliminaBtnArr = document.querySelectorAll('.eliminaBtn')

// eliminaBtnArr.forEach(el => {
    
//     el.addEventListener('click', function(e){
//         e.preventDefault();

//         const conf = confirm("sei sicuro di voler eliminare?");

//         if(conf){
//            location.href = el.href
//         }

//     })

// });

</script>

<?php include("./includes/footer.php") ?>