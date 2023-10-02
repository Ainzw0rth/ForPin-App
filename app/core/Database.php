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
        // Creating tables 
        // Post
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
        
        // User
        $this->query(
            "CREATE table IF NOT EXISTS users (
                user_id SERIAL PRIMARY KEY NOT NULL,
                email VARCHAR(50) NOT NULL,
                fullname VARCHAR(50) NOT NULL,
                username VARCHAR(50) NOT NULL,
                password VARCHAR(50) NOT NULL, 
                is_admin BOOLEAN NOT NULL,
                profile_path VARCHAR(50) NOT NULL DEFAULT 'public/images/testing_images/1.jpeg'
            );"
        );
        $this->execute();

        // Video
        $this->query(
            "CREATE table IF NOT EXISTS videos (
                vid_id SERIAL PRIMARY KEY NOT NULL,
                post_id INT NOT NULL REFERENCES post(post_id),
                vid_path VARCHAR(100) NOT NULL
            );"
        );
        $this->execute();

        // Image
        $this->query(
            "CREATE table IF NOT EXISTS images (
                img_id SERIAL PRIMARY KEY NOT NULL,
                post_id INT NOT NULL REFERENCES post(post_id),
                img_path VARCHAR(100) NOT NULL
            );"
        );
        $this->execute();

        // User_post
        $this->query(
            "CREATE table IF NOT EXISTS user_post (
                user_id INT REFERENCES users(user_id),
                post_id INT REFERENCES post(post_id)
            );"
        );
        $this->execute();

        $this->query(
            "CREATE table IF NOT EXISTS asal (
                id SERIAL PRIMARY KEY NOT NULL,
                nama varchar(50)
            );"
        );
        $this->execute();

        // Inserting values to tables
        $this->query(
            "INSERT INTO asal (nama) VALUES ('brigita');"
        );
        $this->execute();
        
        // User
        $this->query("INSERT INTO users (email, fullname, username, password, is_admin) VALUES
            ('user1@example.com', 'User One', 'userone', 'password1', false),
            ('user2@example.com', 'User Two', 'usertwo', 'password2', false),
            ('user3@example.com', 'User Three', 'userthree', 'password3', false),
            ('admin@example.com', 'Admin User', 'adminuser', 'adminpassword', true),
            ('test@example.com', 'Test User', 'testuser', 'testpassword', false);"
        );
        $this->execute();
        
        // Post
        $this->query("INSERT INTO post (caption, description, post_time, likes, genre) VALUES
            ('Post 1 Caption', 'Description for Post 1', '2023-10-01', 10, 'happy'),
            ('Post 2 Caption', 'Description for Post 2', '2023-10-02', 15, 'horror'),
            ('Post 3 Caption', 'Description for Post 3', '2023-10-03', 5, 'happy'),
            ('Post 4 Caption', 'Description for Post 4', '2023-10-04', 20, 'meme'),
            ('Post 5 Caption', 'Description for Post 5', '2023-10-05', 8, 'horror'),
            ('Post 6 Caption', 'Description for Post 6', '2023-10-06', 12, 'happy'),
            ('Post 7 Caption', 'Description for Post 7', '2023-10-07', 4, 'meme'),
            ('Post 8 Caption', 'Description for Post 8', '2023-10-08', 25, 'horror'),
            ('Post 9 Caption', 'Description for Post 9', '2023-10-09', 14, 'happy'),
            ('Post 10 Caption', 'Description for Post 10', '2023-10-10', 30, 'meme'),
            ('Post 11 Caption', 'Description for Post 11', '2023-10-11', 7, 'horror'),
            ('Post 12 Caption', 'Description for Post 12', '2023-10-12', 18, 'happy'),
            ('Post 13 Caption', 'Description for Post 13', '2023-10-13', 9, 'meme'),
            ('Post 14 Caption', 'Description for Post 14', '2023-10-14', 22, 'horror'),
            ('Post 15 Caption', 'Description for Post 15', '2023-10-15', 6, 'happy'),
            ('Post 16 Caption', 'Description for Post 16', '2023-10-16', 11, 'meme'),
            ('Post 17 Caption', 'Description for Post 17', '2023-10-17', 13, 'horror'),
            ('Post 18 Caption', 'Description for Post 18', '2023-10-18', 28, 'happy'),
            ('Post 19 Caption', 'Description for Post 19', '2023-10-19', 7, 'meme'),
            ('Post 20 Caption', 'Description for Post 20', '2023-10-20', 31, 'horror'),
            ('Post 21 Caption', 'Description for Post 21', '2023-10-21', 10, 'happy'),
            ('Post 22 Caption', 'Description for Post 22', '2023-10-22', 16, 'meme'),
            ('Post 23 Caption', 'Description for Post 23', '2023-10-23', 15, 'horror'),
            ('Post 24 Caption', 'Description for Post 24', '2023-10-24', 19, 'happy');"
        );
        $this->execute();
        
        // User_post
        $this->query("INSERT INTO user_post (user_id, post_id) VALUES
            (1, 1),
            (1, 2),
            (1, 3),
            (1, 4),
            (1, 5),
            (2, 1),
            (2, 2),
            (2, 3),
            (2, 4),
            (2, 5),
            (3, 1),
            (3, 2),
            (3, 3),
            (3, 4),
            (3, 5),
            (4, 1),
            (4, 2),
            (4, 3),
            (4, 4),
            (4, 5),
            (5, 1),
            (5, 2),
            (5, 3),
            (5, 4);"
        );
        $this->execute();
        
        // Image 
        $this->query("INSERT INTO images (post_id, img_path) VALUES
            (1, 'public/images/testing_images/1.jpeg'),
            (2, 'public/images/testing_images/2.jpeg'),
            (3, 'public/images/testing_images/3.jpeg'),
            (4, 'public/images/testing_images/4.jpeg'),
            (5, 'public/images/testing_images/5.jpeg'),
            (6, 'public/images/testing_images/6.jpeg'),
            (7, 'public/images/testing_images/7.jpeg'),
            (8, 'public/images/testing_images/8.jpeg'),
            (9, 'public/images/testing_images/9.jpeg'),
            (10, 'public/images/testing_images/10.jpeg'),
            (11, 'public/images/testing_images/11.jpeg'),
            (12, 'public/images/testing_images/12.jpeg'),
            (13, 'public/images/testing_images/13.jpeg'),
            (14, 'public/images/testing_images/14.jpeg'),
            (15, 'public/images/testing_images/15.jpeg'),
            (16, 'public/images/testing_images/16.jpeg'),
            (17, 'public/images/testing_images/17.jpeg'),
            (18, 'public/images/testing_images/18.jpeg'),
            (19, 'public/images/testing_images/19.jpeg'),
            (20, 'public/images/testing_images/20.jpeg'),
            (21, 'public/images/testing_images/21.jpeg'),
            (22, 'public/images/testing_images/22.gif');"
        );
        $this->execute();
        
        // Video 
        $this->query("INSERT INTO videos (post_id, vid_path) VALUES
            (23, 'public/images/testing_images/xavier.mp4'),
            (24, 'public/images/testing_images/xavier.mp4');"
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