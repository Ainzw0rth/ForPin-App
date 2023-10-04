<?php

class Post_model {
    private $post_table = 'post';
    private $videos_table = 'videos';
    private $images_table = 'images';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query("WITH selected_posts AS (SELECT p.post_id, p.post_time, p.likes, p.genre FROM " . $this->post_table . " as p), selected_images AS (SELECT p.post_id, p.post_time, p.likes, p.genre, i.img_path as media_path FROM selected_posts as p, " . $this->images_table . " as i WHERE p.post_id = i.post_id), selected_videos AS (SELECT p.post_id, p.post_time, p.likes, p.genre, v.vid_path as media_path FROM selected_posts as p, " . $this->videos_table . " as v WHERE p.post_id = v.post_id ), post_links AS (SELECT post_id, post_time, likes, genre, media_path FROM selected_images UNION SELECT post_id, post_time, likes, genre, media_path FROM selected_videos) SELECT post_id, post_time, likes, genre, STRING_AGG(media_path, '@') media_paths FROM post_links GROUP BY post_id, post_time, likes, genre");
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