<?php

var_dump($_POST);

$filters = [
    // "nome" => FILTER_SANITIZE_STRING,//deprecato: meglio usare htmlspecialchars
    // "cognome" =>  FILTER_SANITIZE_STRING,//deprecato: meglio usare htmlspecialchars()
    "email" => FILTER_VALIDATE_EMAIL,
    "anni" => [
        "filter" => FILTER_VALIDATE_INT,
        "options" => [
            "min_range" => 18,
            "max_range" => 121
        ]
    ]
];

$result = filter_var_array($_POST, $filters);
//result restituisce invariati tutti i dati che hanno passato la validazione. 
//Ma sostituisce con un valore false tutti quelli che non l'hanno passata. 
var_dump($result);

//Di conseguenza, potrai procedere controllando a mano se i campi contengono un false e scatenare un una serie di operazioni atte a risolvere i problemi o mostrare all'utente quali errori ha smesso 
//Potrai fare questo anche banalmente, con una serie di IF 
if(!$result["anni"]){
    echo "Anni non rientra nel range definito";
} 

//Se però i campi da validità da validare sono tanti, il mio Consiglio è quello di realizzare delle funzioni che possono ciclare l'arredi risultati e dirti in automatico se c'è stato almeno un errore per bloccare l'esecuzione dello script. 

//Questa funzione controlla se ci sono campi non validi all'interno della lista di quelli appena verificati e restituirà true se almeno un campo non è valido 
function hasInvalidFields(array $validatedFields): bool{
    $result = false;//false fino a prova contraria
    foreach($validatedFields as $field){
        if(!$field) $result = true;
    }   

    return $result;
}

//Questa funzione, invece, ha l'obiettivo di identificare i nomi dei campi che non hanno superato la validazione allo scopo di mostrarli tutti insieme o gestirli di conseguenza 
function getInvalidFields(array $validatedFields): array{
    $result = [];//Arredi di campi non validi se rimane vuoto significa che non ci sono stati campi che non hanno superato la validazione. 
    foreach($validatedFields as $key => $value){
        if(!$value) $result[] = $key;//Ciclando per chiave e valore posso verificare i valori se questi non sono True, allora inserisco nell'array dei risultati la chiave, ossia il nome del campo che stiamo esaminando 
    }
    return $result;//Restituisco l'array che potrà essere vuoto in caso di superamento di tutte le validazioni o pieno in caso contrario. 
}
//Essendo che è la funzione get invalid fields restituisce un array vuoto in caso di mancanza di errori, mi basta con un semplice if e l'utilizzo della funzione count verificare la lunghezza del re se questa è superiore a zero significa che ci sono stati degli errori e potrò adoperare il la variabile dei risultati per spiegare all'utente che cosa ha sbagliato. 
$wrongFields = getInvalidFields($result);
if(count($wrongFields) > 0){
    echo "<h4>Campi Errati:</h4>";
    echo "<ul class=\"alert alert-danger\">";
        foreach($wrongFields as $field):
            echo "<li>$field</li>";        
        endforeach;
    echo "</ul>";
}

//se hasInvalidFields restituisce true posso procedere attuando il blocco dello script/annunciare quali problemi si sono verificati/facendo un redirect
if(hasInvalidFields($result)) die("uno dei campi non è valido");


//Se tutte le validazioni passano e nulla blocca lo script, allora vedrò la scritta a tutti i campi sono validi 
echo "Tutti i campi sono validi";