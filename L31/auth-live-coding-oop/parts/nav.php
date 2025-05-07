<!-- guest links -->
<?php if ($auth->isLoggedIn()): ?>
    <li><a href="index.php" class="nav-link px-2 link-primary">Home</a></li>
    <li><a href="#" class="nav-link px-2 link-secondary">Chi Siamo</a></li>
    <li><a href="#" class="nav-link px-2 link-secondary">Contatti</a></li>
<?php endif; ?>

<?php if ($auth->isLoggedIn()): ?>
    <!-- auth links -->
    <li><a href="rotte-protette/dashboard.php" class="nav-link px-2 link-secondary">Dashboard</a></li>
<?php endif; ?>