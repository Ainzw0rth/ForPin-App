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
        $this->db->query('SELECT username, fullname, profile_path, email FROM users WHERE user_id = ' . $userId);
        return $this->db->single();
    }
    
    public function getUsernameById($userId) {
        $this->db->query('SELECT username FROM users WHERE user_id = ' . $userId);
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
        $this->db->bind('password', password_hash($password, PASSWORD_DEFAULT));
        $this->db->bind('is_admin', false);
        
        $this->db->execute();
    }

    public function login($username, $password) {
        $this->db->query('SELECT user_id, password FROM users WHERE username = :username LIMIT 1');
        $this->db->bind('username', $username);
        
        $user = $this->db->single();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user['user_id'];
        } else {
            throw new LoggedExceptions('Unauthorized', 401);
        }
    }
    
    public function getIsAdmin($userId) {
        $this->db->query('SELECT is_admin FROM users WHERE user_id = :user_id LIMIT 1');
        $this->db->bind('user_id', $userId);
        return $this->db->single();
    }

    public function editUserProf($userId, $username, $fullname, $password, $email, $profile_path) {
        $this->db->query('UPDATE users SET username = :username, fullname = :fullname, password = :password, email = :email, profile_path = :profile_path WHERE user_id = :user_id');
        $this->db->bind('username', $username);
        $this->db->bind('fullname', $fullname);
        $this->db->bind('password', password_hash($password, PASSWORD_DEFAULT));
        $this->db->bind('email', $email);
        $this->db->bind('profile_path', $profile_path);
        $this->db->bind('user_id', $userId);
        $this->db->execute();
    }

    public function deleteAccount($userId) {
        $this->db->query('DELETE FROM users WHERE user_id = :user_id');
        $this->db->bind('user_id', $userId);
        $this->db->execute();
    }

    public function getUserListDesc() {
        $this->db->query('SELECT DISTINCT user_id, username, fullname, profile_path FROM users WHERE is_admin = false');
        return $this->db->resultSet();
    }

    public function getUserDescByUsername($username) {
        $this->db->query('SELECT * FROM users WHERE username = :username LIMIT 1');
        $this->db->bind('username', $username);
        return $this->db->single();
    }
}