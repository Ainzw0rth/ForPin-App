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
}