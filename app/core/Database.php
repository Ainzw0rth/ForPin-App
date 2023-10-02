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
        
            // Perform database operations here
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        $this->createTables();
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

    public function createTables() {
        $this->query(
            "CREATE table IF NOT EXISTS post (
                post_id SERIAL PRIMARY KEY NOT NULL,
                caption VARCHAR(100),
                description VARCHAR(500),
                post_time DATE NOT NULL,
                likes INT NOT NULL DEFAULT 0,
                genre VARCHAR(50) 
            );"
        );
        $this->execute();
        $this->query(
            "CREATE table IF NOT EXISTS video (
                vid_id SERIAL PRIMARY KEY NOT NULL,
                post_id INT NOT NULL REFERENCES post(post_id),
                vid_path VARCHAR(100) NOT NULL
            );"
        );
        $this->execute();
        $this->query(
            "CREATE table IF NOT EXISTS image (
                img_id SERIAL PRIMARY KEY NOT NULL,
                post_id INT NOT NULL REFERENCES post(post_id),
                img_path VARCHAR(100) NOT NULL
            );"
        );
        $this->execute();
        $this->query(
            "CREATE table IF NOT EXISTS user_post (
                user_id INT REFERENCES user(user_id),
                post_id INT REFERENCES post(post_id)
            );"
        );
        $this->query(
            "CREATE table IF NOT EXISTS asal (
                id SERIAL PRIMARY KEY NOT NULL,
                nama varchar(50)
            );"
        );
        $this->execute();
        $this->query(
            "INSERT INTO asal (nama) VALUES ('brigita');"
        );
        $this->execute();
    }

    public function execute() {
        $this->stmt->execute();
    }

    public function resultSet() {
        $this->stmt->execute(); 
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        $this->stmt->execute();
        return $this->stmt->fetch();  
    }
}