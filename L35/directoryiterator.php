<?php

function leggiCartella(string $directory): void{

    $contenutoCartella = new DirectoryIterator($directory);

    // var_dump($contenutoCartella);

    echo "<ul>";

    foreach($contenutoCartella as $item){

        if($item->isDot()){
            continue;
        }

        echo "<li>";
        if($item->isDir()){
            echo "<b>Cartella: </b> ";
        }else if($item->isFile()){
            echo "<b>File: </b> {$item->getFileName()}";
            echo "<b>File: </b> {$item->getSize()}";
        }

        echo "</li>";
    }

    echo "</ul>";

}


leggiCartella(__DIR__);