
<div class="card">
    <img src="https://picsum.photos/200/300?random=<?=$id?>" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title"><?= $nome ?></h5>
        <?php if ($auth->isLoggedIn()): ?>

            <p class="card-text"><?= $prezzo ?></p>
            <a href="?add_to_cart=<?=$id?>&quantity=1" class="btn btn-primary">Aggiungi al carrello</a>

        <?php else: ?>

            <p>Iscriviti per vedere il prezzo</p>
            <a href="<?=REGISTER_URL?>" class="btn btn-primary">Iscriviti</a>

        <?php endif; ?>
    </div>
</div>