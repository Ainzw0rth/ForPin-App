<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;
    private $port = DB_PORT;

    private $dbh;
    private $stmt;

    public function __construct() {
        try {
            $this->dbh = new PDO('pgsql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->db_name . ';user=' . $this->user . ';password=' . $this->pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null) {
        if ( is_null($type) ) {
            switch(true) {
                case is_int($type) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }
    
    public function execute() {
        try {
            $this->stmt->execute();
        } catch (PDOException) {
            throw new LoggedExceptions('Internal Server Error', 500);
        }
    }

    public function resultSet() {
        try {
            $this->stmt->execute(); 
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException) {
            throw new LoggedExceptions('Internal Server Error', 500);
        }

    }

    public function single() {
        try {
            $this->stmt->execute();
            return $this->stmt->fetch();  
        } catch (PDOException) {
            throw new LoggedExceptions('Internal Server Error', 500);
        }
    }

    public function rowCount() {
        try {
            $this->stmt->execute();
            return $this->stmt->rowCount();
        } catch (PDOException) {
            throw new LoggedExceptions('Internal Server Error', 500);
        }
    }
}