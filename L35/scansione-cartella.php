<?php

function leggiCartella(string $directory): void{

    $contenutoCartella = scandir($directory);

    // var_dump($contenutoCartella);

    echo "<ul>";

    foreach($contenutoCartella as $item){

        if($item === '.' || $item === ".."){
            continue;
        }

        $itemPath = "$directory/$item";
        echo "<li>";

        if(is_dir($itemPath)){
            echo "<b>Cartella: </b> <a href=\"$itemPath\">/$item</a>";
        }else if(is_file($itemPath)){
            echo "<b>File: </b> <a href=\"$itemPath\">$item</a>";
        }

        echo "</li>";
    }

    echo "</ul>";

}
