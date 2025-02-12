<?php

    function showPizzaIfFound(){
        //Verifico se è stata ricevuta una richiesta di tipo post 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $pizzaId = $_POST['pizza'] ?? '';
            if (!empty($pizzaId)) {
                
                echo getPrice($pizzaId);
                
            }
        }
        
    }

    function getPrice(int $pizzaId):string{
        switch ($pizzaId) {
            case 20:
                return "La pizza Margherita costa 5€";
            case 38:
                return  "La pizza Diavola costa 1€";
            case 56:
                return  "La pizza Marinara costa 4€";
            case 86:
                return  "La pizza capricciosa costa 8€";
            default:
                return  "La pizza non è disponibile";
        }
    }


    function createPizzaOptionTags(array $dbPizze): void{
        foreach ($dbPizze as $singolaPizza): ?>

            <option value="<?=$singolaPizza['id'] ?>"><?=$singolaPizza['gusto'] ?></option>

        <?php endforeach; 
    }