<?php

$csv = "val1,val2,val3,val4,val5,val6";
echo "<h4>Stringa iniziale:</h4> ";
echo $csv;

$array = explode(',', $csv);
echo "<h4>Stringa trasformata in array con explode, tagliando in corrispondenza delle virgole:</h4> ";
print_r($array);


$stringa = implode('#',$array);
echo "<h4>Arrei ritrasformato in stringa utilizzando implode :</h4> ";
print_r($stringa);