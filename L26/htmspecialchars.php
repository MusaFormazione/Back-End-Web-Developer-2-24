<?php

$input = "<script>alert('xss')</script>";
// echo $input;

$safeInput = htmlspecialchars(string: $input, encoding: "UTF-8");
echo "$safeInput";

$safeInput = htmlentities($input);
echo "$safeInput";

//codifica valori per l'url
$nome = "Mario Rossi";
$nomeSicuro = htmlspecialchars($nome);
$nomePerUrl = urlencode($nome);//rimozione spazi e simboli per la compatibilità con gli url
$nomeNascosto = base64_encode($nomePerUrl);

echo "http://musaformazione.it?user=$nomeNascosto";