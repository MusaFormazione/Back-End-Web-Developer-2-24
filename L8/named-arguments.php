<?php

function mostraDatiProfilo(string $nome, string $email, string $cognome, string $ruolo = 'Cliente', bool $attivo = true):string{
    $output = '';

    $output .= "nome: $nome";
    $output .= " email: $email";
    $output .= " cognome: $cognome";
    $output .= " ruolo: $ruolo";
    $output .= " attivo: $attivo";
    return $output;
}

echo mostraDatiProfilo(nome:'Mario', attivo:true, cognome:'Rossi', email:'info@esempio.it', ruolo:'Admin');