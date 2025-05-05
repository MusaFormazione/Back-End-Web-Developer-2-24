<!-- guest links -->
<?php if (!IS_LOGGED_IN): ?>
    <li><a href="index.php" class="nav-link px-2 link-primary">Home</a></li>
    <li><a href="#" class="nav-link px-2 link-secondary">Chi Siamo</a></li>
    <li><a href="#" class="nav-link px-2 link-secondary">Contatti</a></li>
<?php endif; ?>

<?php if (IS_LOGGED_IN): ?>
    <!-- auth links -->
    <li><a href="rotte-protette/dashboard.php" class="nav-link px-2 link-secondary">Dashboard</a></li>
<?php endif; ?>