<?php

//escape
$html = "<b class=\"nome-classe\">Ciao</b>";
echo $html; //<b class="nome-classe">Ciao</b>

$testo = 'Escape nell\'html';//output: Escape nell'html

$escapeDollaro = "\$dollaro";//output: $dollaro

//Ecco un esempio di come i caratteri speciali vengono utilizzati da PHP. 
//All'interno della pagina HTML questi simboli non verranno in nessun modo renderizzati perché HTML tende ad evitare andate a capo e spazi. 
//Puoi comunque osservare il risultato andando sul browser e cliccando il tasto destro per poi selezionare "visualizza sorgente pagina"
echo " \n  \t\t\t Testo dopo la spaziatura";

$stringaConNewLine = "\nLorem ipsum dolor sit, amet consectetur adipisicing elit.\nIpsum quisquam harum laboriosam repudiandae, repellendus perspiciatis\nnumquam ullam\ntotam officiis cum eaque velit, beatae odit vel, facilis quidem quos facere tenetur.";


echo nl2br($stringaConNewLine);

file_put_contents(__DIR__.'/esempio-output-file.txt', $stringaConNewLine);

