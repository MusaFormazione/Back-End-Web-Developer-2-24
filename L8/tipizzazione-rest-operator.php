<?php

function somma(mixed ...$numeri): void{
    echo array_sum($numeri);
}

somma(4,5,6,'4','6');