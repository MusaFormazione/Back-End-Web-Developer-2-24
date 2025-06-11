<?php include '../parts/header.php';
$auth->requireLogin();

$conn = new Connection("ecommerce-2-24", "Michele", "password");

$query = $conn->getConnection()->query("SELECT id, data FROM ordini WHERE ordini.userId = {$auth->getUserId()}");

$results = $query->fetchAll(PDO::FETCH_ASSOC);



?>
<div class="container">

    <div class="alert alert-info">

    <?php foreach($results as $order):?>
        <div class="row">
            <div class="col">
                # <?=$order['id']?>
            </div>
            <div class="col">
                Data: <?=$order['data']?>
            </div>
            <div class="col">
                <a href="<?= BASE_URL ?>/user-account/single-order.php?id=<?=$order['id']?>">Mostra</a>
            </div>
        </div>
        <?php endforeach;?>
        
    </div>
</div>

<?php include '../parts/footer.php' ?>