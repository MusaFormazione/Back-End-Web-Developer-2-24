<?php
require __DIR__ . "/../utils/ErrorHandler.php";

/**
 * /Questo metodo genera le option per un form di modifica di una pizza ed è in grado di impostare l'attributo selected sulla option relativa al valore salvato a db. 
 * 
 * @param int $disponibile
 * È il valore legato alla disponibilità della pizza che si sta esaminando. 
 * 
 * @return void
 */
function getDisponibileOption(int $disponibile): void{
    $data = [
        "si" => 1,
        "no" => 0
    ];
    foreach($data as $key => $value){
        $selected = $disponibile === $value ? "selected" : "";
        echo "<option $selected value=\"$value\">$key</option>";
    }
}


