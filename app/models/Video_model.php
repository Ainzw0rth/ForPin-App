<?php

class Video_model {
    private $table = 'videos';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    public function getAll() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getUserVideoPath($postId) {
        $this->db->query('SELECT DISTINCT vid_path FROM videos WHERE post_id = ' . $postId);
        return $this->db->resultSet();
    }

    public function addVideo() {
        $postId = $_POST['post_id'];
        $vidPath = $_POST['vid_path'];
        $this->db->query('INSERT INTO videos (post_id, img_path) VALUES (' . $postId . ',' . $vidPath . ')');
        $this->db->execute();
    }
}