<?php

class Connection{
    private $db;

    public function __construct(string $dbName, string $username = '', string $password = '', string $host = "localhost"){
        try {
            $this->db = new PDO("mysql:dbname=$dbName;host=$host", $username, $password);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getConnection(): PDO    {
        return $this->db;
    }

}