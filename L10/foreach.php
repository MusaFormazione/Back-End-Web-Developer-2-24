<script>
    const numeri = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    //Promemoria per ricordare come funzionava il foreach di Javascript. 
    numeri.forEach(n => {
        console.log(n);
    });

</script>

<?php
//Con foreach posso tirare degli array indicizzati
$numeri = [1, 23, 3, 45, 5, 6, 7, 8, 90];

foreach ($numeri as $n) {
    echo "Numero ciclato: $n<br>";
}

//Ma posso ciclare anche degli array associativi, accedendo per giunta ai nomi delle chiavi 

$pizzeArray = [
    [
        "gusto" => "Margherita",
        "prezzo" => 5
    ],
    [
        "gusto" => "Diavola",
        "prezzo" => 1
    ],
    [
        "gusto" => 'Marinara',
        "prezzo" => 4
    ]
];

foreach ($pizzeArray as $pizza) {
    echo "<ul>";
    foreach ($pizza as $key => $value) {
        echo "<li>$key:$value</li>";
    }
    echo "</ul>";
}

$persona = [
    "nome" => "Mario",
    "cognome" => "Rossi",
    "anni" => 30
];

echo "<ul>";
foreach ($persona as $key => $value) {
    echo "<li>$key:$value</li>";
}
echo "</ul>";