<?php

$condizione = false;

//Ricorda che if non è dipendente da else ed else if. 
//Se non hai bisogno (di else ed else if) evita di utilizzarli. 
if($condizione){
 echo "vero";
}

$anni = 3;

if($anni >= 18 && $anni <= 120){
    echo "Sei maggiorenne";
}else if($anni > 120){
    echo "Sei antico";
}else{
    echo "Sei minorenne";
}


