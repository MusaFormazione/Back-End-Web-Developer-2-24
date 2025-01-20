<?php

function getHeader($pageTitle, $dir){
    $title = "$pageTitle | Sito modulare";
    include_once $dir . '/includes/header.php';
}

function getFooter($dir){
    include_once $dir . '/includes/footer.php';
}

function getH1($titolo){
    return "<h1 class=\"page-title\">$titolo</h1>";
}