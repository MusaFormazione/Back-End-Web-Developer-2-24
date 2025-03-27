<?php

function generateRandomNumbersArray(int $iterazioni = 20):array{

    $array = [];
    for($i = 0; $i < $iterazioni; $i++){
        $array[] = rand(1,100);
    }
    return $array;
}




function evenOddGroups(array $array){
    $result = [
        "odd" => [],
        "even" => []
    ];

    foreach($array as $n){
        $evenOdd = $n % 2 === 0 ? "even" : "odd";
        $result[$evenOdd][] = $n;
    }

    $result['even'] = implode(', ',$result['even']);
    $result['odd'] = implode(', ',$result['odd']);

    return $result;
}

$arrayGenerato = generateRandomNumbersArray();

$numeriRaggruppati = evenOddGroups($arrayGenerato);

var_dump($numeriRaggruppati);