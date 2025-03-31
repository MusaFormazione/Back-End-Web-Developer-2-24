<?php

try {
    
    $db = new PDO("mysql:host=localhost;dbname=esercizisql;","Michele","password");
    
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}