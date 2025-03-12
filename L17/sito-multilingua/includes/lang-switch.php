<?php
session_start();

if(isset($_GET['lang'])){
    $lang = $_GET['lang'];   
    $_SESSION['lang'] = $lang;
}else{
    $lang = $_SESSION['lang'] ?? 'it';
}

include "lang/$lang.php";

$langs = [
    'it' => 'Italiano',
    'en' => 'English'
];

function createLangFields(): string{
    global $langs, $lang;

    $fieldsHTML = '';

    foreach($langs as $key => $value){
        $selected = $lang === $key ? 'selected' : '';
        $fieldsHTML .= "<option $selected value=\"$key\">$value</option>";
    }

    return $fieldsHTML;
}

