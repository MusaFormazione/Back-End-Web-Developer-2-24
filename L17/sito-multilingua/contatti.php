<?php require_once './includes/header.php';?>

<main>
    <div class="container">

        
        <section>
            <h1><?=$strings['contacts']['title']?></h1>
            
            <form>
                
                <input type="text" placeholder="Nome" class="form-control">
                <input type="text" placeholder="Cognome" class="form-control">
                <textarea class="form-control"></textarea>
                <button class="btn btn-primary">Invia</button>
            </form>
            
        </section>
    </div>
</main>

<?php require_once './includes/footer.php';?>   