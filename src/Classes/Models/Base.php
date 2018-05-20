<?php

namespace App\Models;

class Base
{
    protected $db;

    public function __construct()
    {
        // Initialize Database connection
        $dbConfig = require (ROOT . '/config/database.php');

        // Create connection
        $this->db = new \mysqli($dbConfig['host'], $dbConfig['user'], $dbConfig['password'], $dbConfig['dbname']);

        // Check db
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }
}