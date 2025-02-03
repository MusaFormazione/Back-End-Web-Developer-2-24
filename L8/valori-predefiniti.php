<?php

function trovaUtente(int|null $id = null): ?string{

    if($id === null){
        return null;
    }

    return "Utente numero $id";
}

echo trovaUtente();