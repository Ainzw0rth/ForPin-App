<?php

class User_model {
    private $table = 'users';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getUserDesc($userId) {
        $this->db->query('SELECT username, fullname, profile_path FROM users WHERE user_id = ' . $userId);
        return $this->db->single();
    }

    public function isEmailAlreadyTaken($email) {
        $this->db->query('SELECT email FROM users WHERE email = :email LIMIT 1');
        $this->db->bind('email', $email);

        return $this->db->single();
    }

    public function isUserAlreadyTaken($username) {
        $this->db->query('SELECT username FROM users WHERE username = :username LIMIT 1');
        $this->db->bind('username', $username);

        return $this->db->single();
    }

    public function signup($email, $username, $fullname, $password) {
        $this->db->query('INSERT INTO users (email, username, fullname, password, is_admin) VALUES (:email, :username, :fullname, :password, :is_admin)');
        $this->db->bind('email', $email);   
        $this->db->bind('username', $username);   
        $this->db->bind('fullname', $fullname);   
        $this->db->bind('password', $password);
        $this->db->bind('is_admin', false);
        
        $this->db->execute();
    }
}