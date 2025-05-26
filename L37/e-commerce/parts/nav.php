<li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
<li><a href="#" class="nav-link px-2">Prodotti</a></li>
<?php if($auth->isLoggedIn()): ?>
    <li><a href="#" class="nav-link px-2">Ordini</a></li>
    <li><a href="#" class="nav-link px-2">Carrello</a></li>
<?php endif; ?>