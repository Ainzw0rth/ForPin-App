<?php

class Image_model {
    private $table = 'images';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    public function getAll() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getUserImagePath($postId) {
        $this->db->query('SELECT img_path FROM images WHERE post_id = ' . $postId);
        return $this->db->resultSet();
    }
}