<?php if (!IS_LOGGED_IN): ?>
    <a href="<?= BASE_URL ?>/login.php" class="btn btn-outline-primary me-2">Login</a>
    <a href="<?= BASE_URL ?>/register.php" class="btn btn-primary">Sign-up</a>
<?php endif; ?>


<?php if (IS_LOGGED_IN): ?>
    <a href="<?= BASE_URL ?>/auth/main/user-logout.php" class="btn btn-danger">Logout</a>
<?php endif; ?>