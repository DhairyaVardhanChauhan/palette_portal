<?php

class Dbh {
    private $conn;

    public function __construct($dbServer, $dbUsername, $dbPassword, $dbName) {
        // Try connecting to the Database
        $this->conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);

        // Check the connection
        if(!$this->conn) {
            die('Error: Cannot connect to the database');
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

// Usage:
// Create an instance of the DatabaseConfig class
$dbConfig = new Dbh('localhost', 'root', '', 'login');

// Get the database connection object
$conn = $dbConfig->getConnection();

// Now you can use the $conn object to perform database operations, e.g. executing queries, fetching results, etc.

?>
