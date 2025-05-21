<?php

$n = "\n";

echo 'Anno attuale: ' . date('Y') . $n;
echo 'Data di oggi: ' . date('Y/m/d') . $n;
echo 'Che ore sono: ' . date("H:i:s") . $n;

//timestamp

echo "Numero di secondi trascorsi dal 1 gennaio 1970: " . time();

echo "$n=============================$n";

//confronto tra date
$adesso = time();//Timestamp attuale
$dataScadenzaPromozione = strtotime('2025/05/20');
echo "Prima data: $adesso, seconda data: $dataScadenzaPromozione $n";

if($adesso < $dataScadenzaPromozione){
    echo "La promozione è attiva";
}else{
    echo "La promozione è scaduta";
}

echo "$n=============================$n";

echo date("d/m/Y H:i:s", strtotime('+7 days')) . $n;
echo date("d/m/Y H:i:s", strtotime("21-05-2025"));