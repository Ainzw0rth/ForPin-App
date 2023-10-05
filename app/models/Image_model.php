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
        $this->db->query('SELECT DISTINCT img_path FROM images WHERE post_id = ' . $postId);
        return $this->db->resultSet();
    }

    public function addImage($postId, $imgPath) {
        $this->db->query('INSERT INTO images (post_id, img_path) VALUES (:post_id, :img_path)');
        $this->db->bind('post_id', $postId);
        $this->db->bind('img_path', $imgPath);
        $this->db->execute();
    }
}