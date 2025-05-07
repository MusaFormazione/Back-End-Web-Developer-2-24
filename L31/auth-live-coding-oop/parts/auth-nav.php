<?php if ($auth->isLoggedIn()): ?>
    <a href="<?= BASE_URL ?>/login.php" class="btn btn-outline-primary me-2">Login</a>
    <a href="<?= BASE_URL ?>/register.php" class="btn btn-primary">Sign-up</a>
<?php endif; ?>


<?php if ($auth->isLoggedIn()): ?>
    <a href="?action=logout" class="btn btn-danger">Logout</a>
<?php endif; ?>

<?php
if($isset($_GET['action']) && $_GET['action'] == 'logout'){
    $auth->logout();
}
?>