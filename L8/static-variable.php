<?php

function contatore(){
    static $count = 0;
    
    $count++;

    echo "Ora il valore della variabile \$count è pari a: $count<br>";
}

contatore();
contatore();
contatore();
contatore();