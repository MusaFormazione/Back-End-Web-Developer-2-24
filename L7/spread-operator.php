<?php

function somma(...$numeri){
    return array_sum($numeri);
}


$array = [1,2,3,4,5,6];

echo somma(...$array);