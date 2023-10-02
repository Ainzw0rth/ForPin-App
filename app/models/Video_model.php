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
        $this->db->query('SELECT vid_path FROM videos WHERE post_id = ' . $postId);
        return $this->db->resultSet();
    }
}