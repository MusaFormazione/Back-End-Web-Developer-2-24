<?php

require_once __DIR__  . '/classes/Connection.php';

/**
 * Aggiunge un prodotto al carrello
 * @param int $ProductId Id del prodotto da aggiungere al carrello
 * @return void
 */
function addToCart(int $productId, int $quantity = 1): void{

    //logica per prevenire duplicati nel carrello
    //punto 1: cerca nel carrello se il prodotto selezionato esiste già
    $dbProd = array_find($_SESSION['cart'], function($item) use ($productId){
            return $item['id'] === $productId;
        });

    //punto 2: Se non esiste allora aggiungi l'attuale prodotto al carrello
    if(!isset($dbProd)){
        $_SESSION['cart'][] = [
            'id' => $productId,
            'qty' => $quantity
        ];
    }else{
        //in caso contrario accedi al prodotto, ed incrementa la sua quantità
        foreach($_SESSION['cart'] as &$item){
            if($item['id'] === $productId){
                $item['qty'] += $quantity;
            }
        }
    }

    ErrorHelper::setSessionMessage('Prodotto aggiungo al carrello','?');
    
}

function removeFromCart(int $productId): void{
    //Attenzione: questa funzione non tiene conto della possibile presenza di più prodotti dello stesso tipo nel carrello, per questioni di tempistiche la lasceremo così

    //Eventualmente consiglio di lasciare così questa funzione(nel caso l'utente voglia davvero rimuovere il prodotto dal carrello), e creare anche una funzione per ridurre o aumentare la quantità del prodotto

    $_SESSION['cart'] = array_filter($_SESSION['cart'],function($item) use ($productId){
        var_dump($item);
        var_dump($productId);
        return $item['id'] != $productId;
    });
    
    ErrorHelper::setSessionMessage('Prodotto rimosso dal carrello','?');

}


/*
* recupera i dati di ogni prodotto legato agli id e restituisce i prodotti completi di tutti i dettagli
*/
function getCartProductDetails(){

    $ids = getCartItemsIds();//gli id dei prodotti nel carrello
    $dbProducts = getProductsById($ids);//prodotti presenti nel carrello, dopo aver recuperato tutti i loro dettagli dal db.
    
    //ciclo gli id dei prodotti presenti nel carrello e li restituisco arricchiti con tutti i loro dettagli(chiavi degli array associativi e relativi valori)
    return array_map(function($cartProd) use ($ids, $dbProducts) {

        $dbProd = array_find($dbProducts, function($item) use ($cartProd){
            return $item['id'] === $cartProd['id'];
        });

        $dbProd['qty'] = $cartProd['qty'];

        return $dbProd;

    }, $_SESSION['cart']);
    //il carrello non contiene prodotti completi, ma solo array associativi formati così:
    // es: [
    //     'id' => $ProductId,
    //     'qty' => $quantity
    // ];

}

/**
 * Dato l'array $ids (array di id di prodotti esistenti) effettua una query e restituisce tutti i prodotti corrispondenti agli id forniti
 * 
 * Restituisce: Tutti i prodotti nel db identificati tramite gli id forniti 
 */
function getProductsById(array $ids):array{
    $idsString = implode(',',$ids);//per effettuare la query dobbiamo avere una stringa di id separati da virgola. Es 2,7,54

    $conn = new Connection("ecommerce-2-24", "Michele", "password");//stabilisco la connessione al db
    $sql = "SELECT * FROM prodotti WHERE id IN ($idsString)";//preparo la query
    //in pratica sarà così: "SELECT * FROM prodotti WHERE id IN (2,7,54)" => Preleva tutti i dati dalla tabella prodotti, solo per i prodotti con id 2, 7 e 54

    $query = $conn->getConnection()->query($sql);//eseguo la query

    return $query->fetchAll(PDO::FETCH_ASSOC);//restituisco i prodotti trovati come array associativo
}

/**
 * Restituisce gli id di tutti i prodotti nel carrello.
 * Utile quando si devono fare query SQL per recuperare i dettagli dei prodotti, siccome in sessione non stiamo salvando tutti i dati di ogni prodotto che l'utente ha inserito nel carrello
 */
function getCartItemsIds(): array{
    return array_map(function($item){
        return $item['id'];
    }, $_SESSION['cart']);
}

function insertOrder():bool{
    //In un database relazionale, siccome Ordini e prodotti sono entità a sé stanti Sarà necessario eseguire più query Consecutive per poter effettuare un ordine completo 
    //La logica che vedrai all'interno di questa funzione, quindi, sarà la seguente:
    //Inseriamo Un solo ordine e poi un ORDINI_PRODOTTI per ogni prodotto nel carrello
    
    global $auth;

    if(!$auth->isLoggedIn()) die('Utente non loggato');

    $conn = new Connection("ecommerce-2-24", "Michele", "password");
    $db = $conn->getConnection();

    try{

        $db->beginTransaction();
        //Primo passaggio:
        //Utilizzo l'id dell'utente loggato e la data di oggi per inserire l'ordine (nella tabella ORDINI). 
        $userId = $auth->getUserId();
        $date = date("Y-m-d H:i:s");
        
        $sql = "INSERT INTO ordini (userId, data) VALUES (:userId, :data)";
        $query = $db->prepare($sql);

        $query->bindParam(':userId', $userId, PDO::PARAM_INT);
        $query->bindParam(':data', $date, PDO::PARAM_STR);

        $query->execute();
        
        $orderId = $db->lastInsertId();
        
        //Secondo passaggio:
        //Il fatto di aver inserito l'ordine per adesso non significa nulla. Dovrò anche andare a collegare all'ordine una serie di prodotti. 
        //Per ogni prodotto del carrello eseguo un singolo inserimento nella tabella prodotti
        $cartProducts = $_SESSION['cart'];
        
        foreach($cartProducts as $product){
            [
                'id' => $productId,
                'qty' => $qty,
            ] = $product;
                
            $sql = "INSERT INTO ordini_prodotti (order_id, prodotto_id, quantita) VALUES ($orderId, $productId, $qty)";
            $db->query($sql);
        }
         
        $db->commit();

        $_SESSION['cart'] = [];
        return true;
    }catch(PDOException $e){
        $db->rollBack();
        echo $e->getMessage();
        return false;
    }


}

function isCartEmpty(): bool{
    return count($_SESSION['cart']) === 0;
}

function getCartTotal(array $cartProducts):int|float{
    if(isCartEmpty()) return 0;

    return array_reduce($cartProducts, function($cartTotal, $product){
        return $cartTotal + ($product['prezzo'] * $product['qty']);
    }, 0);
}