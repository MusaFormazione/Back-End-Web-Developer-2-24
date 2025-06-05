<?php

require_once __DIR__  . '/classes/Connection.php';

/**
 * Aggiunge un prodotto al carrello
 * @param int $ProductId Id del prodotto da aggiungere al carrello
 * @return void
 */
function addToCart(int $ProductId, int $quantity = 1): void{

    $_SESSION['cart'][] = [
        'id' => $ProductId,
        'qty' => $quantity
    ];

    ErrorHelper::setSessionMessage('Prodotto aggiungo al carrello','?');
    
}

function removeFromCart(int $productId): void{
    
    $_SESSION['cart'] = array_filter($_SESSION['cart'],function($item){
        global $productId;
        return $item['id'] != $productId;
    });
    
    ErrorHelper::setSessionMessage('Prodotto rimosso dal carrello','?');

}

function sessionCartToProductCart(array $ids){

    
    return array_map(function($cartProd) use ($ids) {

        $dbProducts = getProductsById($ids);

        $dbProd = array_find($dbProducts, function($item) use ($cartProd){
            return $item['id'] === $cartProd['id'];
        });

        return $dbProd;

    }, $_SESSION['cart']);

}

function getProductsById(array $ids):array{
    $idsString = implode(',',$ids);

    $conn = new Connection("ecommerce-2-24", "Michele", "password");
    $sql = "SELECT * FROM prodotti WHERE id IN ($idsString)";

    $query = $conn->getConnection()->query($sql);

    return $query->fetchAll(PDO::FETCH_ASSOC);
}


function getCartItemsIds(): array{
    return array_map(function($item){
        return $item['id'];
    }, $_SESSION['cart']);
}