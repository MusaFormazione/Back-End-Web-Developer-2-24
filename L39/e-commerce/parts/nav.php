<li><a href="<?=BASE_URL?>/index.php" class="nav-link px-2 link-secondary">Home</a></li>
<?php if($auth->isLoggedIn()): ?>
    <li><a href="<?=BASE_URL?>/user-account/orders.php" class="nav-link px-2">Ordini</a></li>
    <li><a href="<?=BASE_URL?>/user-account/cart.php" class="nav-link px-2">Carrello</a></li>
<?php endif; ?>