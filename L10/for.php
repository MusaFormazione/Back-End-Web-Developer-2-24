<?php

for($i = 0; $i < 10; $i++){
    echo "Iterazione n°$i<br>";
}

echo '<hr>';

for($i = 0; $i < 10; $i++){
    if($i == 2){
        continue;//Se se viene eseguito termina l'iterazione attuale passando a quella successiva-
        //Di conseguenza, quando i sarà uguale a due, l'iterazione si fermerà alla riga 11 
    }
    echo "Iterazione n°$i<br>";

    if($i == 7){
        //Se la condizione è vera, termino l'esecuzione del ciclo 
        echo 'Ciclo terminato prematuramente dalla parola chiave break.';
        break;
    }
}