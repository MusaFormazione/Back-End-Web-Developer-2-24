<?php

//Posso invocare la funzione anche prima di averla dichiarata 
saluto();//Invocazione della funzione
function saluto(){
    //Definizione della funzione 
    echo 'Funzione saluto dice: Ciao Mondo<br>';
}

saluto();//Tutte le volte che invoco la funzione questa verrà eseguita e le istruzioni al suo interno con essa 

echo '<hr>';

//Scope delle variabili
$variabileEsterna = 'Contenuto della variabile globale<br>';

function testScope(){
    //echo $variabileEsterna;//La variabile è stata è stata definita esternamente alla funzione, quindi non esiste al suo interno. 
    
    $nomeFunzione = __FUNCTION__;
    $valiabileInterna = "Contenuto della variabile locale nella funzione $nomeFunzione";
}


//echo $valiabileInterna;//La variabile è stata definita all'interno della funzione test scope e di conseguenza al suo esterno non esiste. 

echo '<hr>';

function testScopeGlobal(){
    $nomeFunzione = __FUNCTION__;
    global $variabileEsterna;//In questo modo rendo disponibile la variabile globale all'interno dell'attuale funzione 
    echo "$variabileEsterna nella funzione $nomeFunzione <br>";
    
    $valiabileInterna = "Contenuto della variabile locale nella funzione $nomeFunzione";//Non c'è alcun modo di far uscire questo valore dalla funzione, a meno che non si utilizzi la parola chiave return
    return $valiabileInterna;
}

echo testScopeGlobal();

echo '<hr>';

function returnMultiplo(){
    $var1 = 1;
    $var2 = 2;
    $var3 = 3;
    
    return [
        $var1,
        $var2,
        $var3
    ];
}

var_dump(returnMultiplo());
echo '<hr>';