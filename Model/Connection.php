<?php

// Modification of the name of database 'dream_seller' to 'phpsymfony'

class Connection
{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $db;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'phpsymfony';
        $this->username = '';
        $this->password = '';

        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->username, $this->password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getDb()
    {
        return $this->db;
    }
}
