<?php


class Math{
    public static function somma(int|float ...$numeri): float|int{
        return array_sum($numeri);
    }

    public static function random($min = 0, $max = 0): int{
        return rand($min, $max);
    }
}

// $m = new Math();
// echo $m->somma(1,2,3,4,5);


echo Math::somma(1,2,3,4,5,6);