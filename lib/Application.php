<?php
class Application {
    // Database server address
    private $dbServer = 'localhost';
    // Name of the database to connect to
    private $dbName = 'local';
    // Database username
    private $dbUsername = 'root';
    // Database password
    private $dbPassword = 'root';
    
    // This function creates a PDO connection to the database
    public function connect() {
        try {
            // Connect to the database using the provided server, database name, username, and password
            $connection = new PDO('mysql:host=' . $this->dbServer . ';dbname=' . $this->dbName, $this->dbUsername, $this->dbPassword);
            // Set the default fetch mode for the connection to be associative array
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // Return the connection
            return $connection;
        } catch (PDOException $e) {
            // If there is an error connecting, return false
            return false;
        } 
    }    

    // This function starts the application by connecting to the database
    public function start() {
        try {
            // Connect to the database using the provided server, database name, username, and password
            $connection = new PDO('mysql:host=' . $this->dbServer . ';dbname=' . $this->dbName, $this->dbUsername, $this->dbPassword);
        } catch (PDOException $e) {
            // If the database doesn't exist, create it and the tables
            if ($e->getCode() == '1049') {
                try {
                    // Connect to the server using the provided server address, username, and password
                    $connection = new PDO('mysql:host=' . $this->dbServer, $this->dbUsername, $this->dbPassword);
                    // Create the database
                    $connection->exec("CREATE DATABASE $this->dbName");
    
                    // Connect to the new database using the provided database name, server address, username, and password
                    $connection = new PDO('mysql:dbname=' . $this->dbName . ';host=' . $this->dbServer, $this->dbUsername, $this->dbPassword);
                    // Create table_a
                    $connection->exec("CREATE TABLE table_a(
                        id bigint(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        value text NOT NULL
                    )");
                    // Create table_b
                    $connection->exec("CREATE TABLE table_b(
                        id bigint(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        value bigint(20) NOT NULL
                    )");
                    // Create table_c
                    $connection->exec("CREATE TABLE table_c(
                        id bigint(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        value text NOT NULL
                    )");
                } catch (PDOException $e) {
                    return $e->getMessage();
                }
            } 
            // If the database information is incorrect, show an error message
            elseif ($e->getCode() == '1045') {
                echo '<p class="alert red">Apache and MySQL must be running<br>And you must have a MySQL username with <code>root</code> and without password.</p>';
            }
        }
    }

}