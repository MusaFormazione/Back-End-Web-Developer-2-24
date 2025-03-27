<?php

class Calcoli{

    public static function somma(int $a, int $b):int{
        return $a + $b;
    }

    public static function sottrazione(int $a, int $b):int{
        return $a - $b;
    }

    public static function divisione(int $a, int $b):int{
        return $a / $b;
    }

}

echo Calcoli::somma(2,2);
echo Calcoli::sottrazione(2,2);
echo Calcoli::divisione(2,2);

