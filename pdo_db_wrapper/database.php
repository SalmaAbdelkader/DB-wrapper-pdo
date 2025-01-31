<?php

class Database {
    
    private $host = 'localhost';
    private $db = 'your_database';
    private $user = 'your_username';
    private $pass = 'your_password';
    private $charset = 'utf8mb4';
    private $pdo;
    private $stmt;
    private $error;
    
    // Constructor to establish a database connection
    public function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Prepare a SQL statement
    public function query($sql) {
        $this->stmt = $this->pdo->prepare($sql);
    }

    // Bind parameters to the statement
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute() {
        return $this->stmt->execute();
    }

    // Get a single record as an associative array
    public function single() {
        $this->execute();
        return $this->stmt->fetch();
    }

    // Get multiple records as an array of associative arrays
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    // Get the row count
    public function rowCount() {
        return $this->stmt->rowCount();
    }

    // Get the last inserted ID
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }

    // Transaction begin
    public function beginTransaction() {
        return $this->pdo->beginTransaction();
    }

    // Transaction commit
    public function endTransaction() {
        return $this->pdo->commit();
    }

    // Transaction rollback
    public function cancelTransaction() {
        return $this->pdo->rollBack();
    }
}

