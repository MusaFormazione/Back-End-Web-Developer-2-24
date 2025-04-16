<nav aria-label="Page navigation example">
    <ul class="pagination">

    <?php
    
    $paginaPrecedente = $pagina - 1;
    $paginaSuccessiva = $pagina + 1;
    
    ?>

        <?php if ($pagina > 1): ?>
            <li class="page-item">
                <a class="page-link" href="<?="?pagina=$paginaPrecedente"?>">Previous</a>
            </li>
        <?php endif ?>

        <?php for ($i = 1; $i <= $righePaginazione; $i++): ?>
            <li class="page-item">
                <a class="page-link" href="?pagina=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($pagina < $righePaginazione): ?>
            <li class="page-item">
                <a class="page-link" href="<?="?pagina=$paginaSuccessiva"?>">Next</a>
            </li>
        <?php endif ?>
    </ul>
</nav>