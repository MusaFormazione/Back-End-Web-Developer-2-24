<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=livecoding_2_24_auth","Michele","password");
} catch (PDOException $e) {
    die($e->getMessage());
}