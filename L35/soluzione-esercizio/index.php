<?php

include 'Connection.php';

$file = __DIR__ . '/csv/prodotti.csv';

$fileHandler = fopen($file,'r');

$primaRiga = fgets($fileHandler);


while(!feof($fileHandler)){

    $riga = fgets($fileHandler);

    if(!empty($riga)){

        $arrayValori = explode(',', $riga);

        [
            $id, 
            $name, 
            $category, 
            $price, 
            $stock, 
            $description, 
            $sku
        ] = $arrayValori;

        $prodotto = [
            'id' => (int) $id,
            'name' => $name,
            'category' => $category,
            'price' => (int) $price, 
            'stock' => (int) $stock, 
            'description' => $description, 
            'sku' => $sku
        ];

        echo addProduct($prodotto) ?  "Prodotto $sku inserito" : "Errere inserimento prodotto $sku";

    }

}

//operazioni di pulizia
$prodotto = '';

function addProduct(array $product):bool{

    $conn = new Connection('esercizio-l35','Michele','password');

    $sql = "INSERT INTO prodotti (name,category,price,stock,description,sku) VALUES (:name,:category,:price,:stock,:description,:sku)";

    $query = $conn->getConnection()->prepare($sql);

    [
            'name' => $name,
            'category' => $category,
            'price' => $price, 
            'stock' => $stock, 
            'description' => $description, 
            'sku' => $sku
    ] =  $product;

    $query->bindParam(':name',$name);
    $query->bindParam(':category',$category);
    $query->bindParam(':price',$price, PDO::PARAM_INT);
    $query->bindParam(':stock',$stock, PDO::PARAM_INT);
    $query->bindParam(':description',$description);
    $query->bindParam(':sku',$sku);

    return $query->execute();

}
