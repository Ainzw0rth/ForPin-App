<?php

class User_post_model {
    private $table = 'user_post';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    public function getAll() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPostId($currentUserId) {
        $this->db->query('SELECT post_id FROM user_post WHERE user_id = ' . $currentUserId);
        return $this->db->resultSet();
    }

    public function getUserId($currentPost) {
        $this->db->query('SELECT user_id FROM user_post WHERE post_id = ' . $currentPost);
        return $this->db->single();
    }
}