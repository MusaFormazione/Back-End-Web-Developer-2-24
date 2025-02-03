<?php

echo "<h2>Senza riferimento alla variabile originale</h2>";
function raddoppia($x){
    $x *= 2;
    echo "Valore di \$x dentro la funzione: $x<br>";
}

$numero = 4;

raddoppia($numero);
echo "Valore di \$numero fuori dalla funzione: $numero<br>";

echo '<hr>';
echo "<h2>Con riferimento alla variabile originale</h2>";

function raddoppiaModifica(&$x){
    //con il simbolo & Stiamo dicendo PHP che se il valore in ingresso deriva da una variabile, allora eventuali modifiche a quel valore dovranno riflettersi anche sul valore della variabile originale. 
    $x *= 2;
    echo "Valore di \$x dentro la funzione: $x<br>";
}

$numero = 4;

raddoppiaModifica($numero);
echo "Valore di \$numero fuori dalla funzione: $numero<br>";