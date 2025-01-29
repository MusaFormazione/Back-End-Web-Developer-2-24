<?php

$pizza = [
    'gusto' => 'Margherita',
    'prezzo' => 5
];

['gusto' => $gusto, 'prezzo' => $prezzo] = $pizza;

echo "<h1>Dettagli della pizza:</h1>";
echo "<ul>
    <li>Gusto: $gusto </li>
    <li>Prezzo:  $prezzo € </li>
</ul>";