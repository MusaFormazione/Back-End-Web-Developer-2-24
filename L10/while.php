<?php


$count = 0;

while($count < 10){
    echo "Iterazione n°$count<br>";
    $count++;
}


echo "<ul>";
while($count > 0){
    echo "<li>Iterazione n°$count</li>";
    $count--;
}
echo "</ul>";