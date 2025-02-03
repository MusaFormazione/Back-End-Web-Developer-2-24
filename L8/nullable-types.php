<?php

function trovaUtente(?int $id): ?string{

    if($id === null){
        return null;
    }

    return "Utente numero $id";
}

echo trovaUtente(null);