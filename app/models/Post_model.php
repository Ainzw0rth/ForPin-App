<?php

class Post_model {
    private $table = 'post';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    public function getAll() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPostElements($postId) {
        $this->db->query('SELECT caption, description, post_time, likes, genre FROM post WHERE post_id = ' . $postId . 'LIMIT 1');
        return $this->db->single();
    }

    public function addLikes($postId) {
        $this->db->query('UPDATE post SET likes = likes + 1 WHERE post_id = ' . $postId);
    }

    public function substractLikes($postId) {
        $this->db->query('UPDATE post SET likes = likes - 1 WHERE post_id = ' . $postId);
    }
}