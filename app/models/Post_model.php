<?php

class Post_model {
    private $post_table = 'post';
    private $user_post_table = 'user_post';
    private $videos_table = 'videos';
    private $images_table = 'images';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll($search) {
        $list = explode("@", $search);
        /*
        0 -> search
        1 -> category
        2 -> filter
        3 -> sort 
        */

        $groupby_query = " GROUP BY post_id, caption, post_time, likes, genre";
        $original_query = "WITH selected_posts AS (SELECT p.post_id, p.caption, p.post_time, p.likes, p.genre FROM " . $this->post_table . " as p), selected_images AS (SELECT p.post_id, p.caption, p.post_time, p.likes, p.genre, i.img_path as media_path FROM selected_posts as p, " . $this->images_table . " as i WHERE p.post_id = i.post_id), selected_videos AS (SELECT p.post_id, p.caption, p.post_time, p.likes, p.genre, v.vid_path as media_path FROM selected_posts as p, " . $this->videos_table . " as v WHERE p.post_id = v.post_id ), post_links AS (SELECT post_id, caption, post_time, likes, genre, media_path FROM selected_images UNION SELECT post_id, caption, post_time, likes, genre, media_path FROM selected_videos) SELECT post_id, caption, post_time, likes, genre, STRING_AGG(media_path, '@') media_paths FROM post_links";

        if (sizeof($list) == 1) {
            $this->db->query($original_query . $groupby_query . " LIMIT 10");
        } else {
            // where
            $where_query = " WHERE";
            if (substr($list[0], 2) != "") { // search
                $where_query .= " caption LIKE '%" . substr($list[0], 2) . "%'";
            }
            
            if (substr($list[1], 2) != "0") { // category
                if ($where_query != " WHERE") {
                    $where_query .= " AND";
                }

                $where_query .= " genre = '" . substr($list[1], 2) . "'";
            }

            if (substr($list[2], 2) != "0") { // filter
                if ($where_query != " WHERE") {
                    $where_query .= " AND";
                }

                if (substr($list[2], 2) == "1") {
                    $where_query .= " post_time = CURRENT_DATE";
                } else {
                    $where_query .= " post_time >= CURRENT_DATE - INTERVAL '" . substr($list[2], 2) . "' day AND post_time <= CURRENT_DATE";
                }
            }

            if ($where_query == " WHERE") {
                $where_query = "";
            }

            // sort
            if (substr($list[3], 2) != "0") { // sort
                if (substr($list[3], 2) == "1") {
                    $order_query = " ORDER BY post_time ASC";
                } else if (substr($list[3], 2) == "2") {
                    $order_query = " ORDER BY post_time DESC";
                } else if (substr($list[3], 2) == "3") {
                    $order_query = " ORDER BY likes ASC";
                } else {
                    $order_query = " ORDER BY likes DESC";
                }
            } else {
                $order_query = " ";
            }

            // limit
            $limit_query = "";
            
            if (sizeof($list) == 5) {
                $limit_query .= " LIMIT 10 OFFSET " . ((((int)substr($list[4], 5)) - 1) * 10);
            } else {
                $limit_query .= " LIMIT 10";
            }

            $this->db->query($original_query . $where_query . $groupby_query . $order_query . $limit_query);
        }

        return $this->db->resultSet();
    }

    public function getAmount($search) {
        $list = explode("@", $search);
        /*
        0 -> search
        1 -> category
        2 -> filter
        3 -> sort 
        */

        $groupby_query = " GROUP BY post_id, caption, post_time, likes, genre";
        $original_query = "WITH selected_posts AS (SELECT p.post_id, p.caption, p.post_time, p.likes, p.genre FROM " . $this->post_table . " as p), selected_images AS (SELECT p.post_id, p.caption, p.post_time, p.likes, p.genre, i.img_path as media_path FROM selected_posts as p, " . $this->images_table . " as i WHERE p.post_id = i.post_id), selected_videos AS (SELECT p.post_id, p.caption, p.post_time, p.likes, p.genre, v.vid_path as media_path FROM selected_posts as p, " . $this->videos_table . " as v WHERE p.post_id = v.post_id ), post_links AS (SELECT post_id, caption, post_time, likes, genre, media_path FROM selected_images UNION SELECT post_id, caption, post_time, likes, genre, media_path FROM selected_videos), suitable AS (SELECT post_id, caption, post_time, likes, genre, STRING_AGG(media_path, '@') media_paths FROM post_links";

        if (sizeof($list) == 1) {
            $this->db->query($original_query . $groupby_query. ") SELECT COUNT(*) FROM suitable");
        } else {
            // where
            $where_query = " WHERE";
            if (substr($list[0], 2) != "") { // search
                $where_query .= " caption LIKE '%" . substr($list[0], 2) . "%'";
            }
            
            if (substr($list[1], 2) != "0") { // category
                if ($where_query != " WHERE") {
                    $where_query .= " AND";
                }

                $where_query .= " genre = '" . substr($list[1], 2) . "'";
            }

            if (substr($list[2], 2) != "0") { // filter
                if ($where_query != " WHERE") {
                    $where_query .= " AND";
                }

                if (substr($list[2], 2) == "1") {
                    $where_query .= " post_time = CURRENT_DATE";
                } else {
                    $where_query .= " post_time >= CURRENT_DATE - INTERVAL '" . substr($list[2], 2) . "' day AND post_time <= CURRENT_DATE";
                }
            }

            if ($where_query == " WHERE") {
                $where_query = "";
            }

            $this->db->query($original_query . $where_query . $groupby_query . ") SELECT COUNT(*) FROM suitable");
        }
        return $this->db->resultSet();
    }

    public function getAmountFromUserId($userId) {
        $groupby_query = " GROUP BY post_id, caption, post_time, likes, genre";
        $original_query = "WITH selected_posts AS (SELECT p.post_id, p.caption, p.post_time, p.likes, p.genre FROM " . $this->post_table . " as p, " . $this->user_post_table . " as up WHERE up.user_id = " . $userId . " AND up.post_id = p.post_id), selected_images AS (SELECT p.post_id, p.caption, p.post_time, p.likes, p.genre, i.img_path as media_path FROM selected_posts as p, " . $this->images_table . " as i WHERE p.post_id = i.post_id), selected_videos AS (SELECT p.post_id, p.caption, p.post_time, p.likes, p.genre, v.vid_path as media_path FROM selected_posts as p, " . $this->videos_table . " as v WHERE p.post_id = v.post_id ), post_links AS (SELECT post_id, caption, post_time, likes, genre, media_path FROM selected_images UNION SELECT post_id, caption, post_time, likes, genre, media_path FROM selected_videos), suitable AS (SELECT post_id, caption, post_time, likes, genre, STRING_AGG(media_path, '@') media_paths FROM post_links";
        $this->db->query($original_query . $groupby_query. ") SELECT COUNT(*) FROM suitable");

        return $this->db->resultSet();
    }

    public function getAllPostFromUserId($search, $userId) {
        $list = explode("@", $search);
        /*
        0 -> residue from splitting
        1 -> page
        */

        $groupby_query = " GROUP BY post_id, caption, post_time, likes, genre";
        $original_query = "WITH selected_posts AS (SELECT p.post_id, p.caption, p.post_time, p.likes, p.genre FROM " . $this->post_table . " as p, " . $this->user_post_table . " as up WHERE up.user_id = " . $userId . " AND up.post_id = p.post_id), selected_images AS (SELECT p.post_id, p.caption, p.post_time, p.likes, p.genre, i.img_path as media_path FROM selected_posts as p, " . $this->images_table . " as i WHERE p.post_id = i.post_id), selected_videos AS (SELECT p.post_id, p.caption, p.post_time, p.likes, p.genre, v.vid_path as media_path FROM selected_posts as p, " . $this->videos_table . " as v WHERE p.post_id = v.post_id ), post_links AS (SELECT post_id, caption, post_time, likes, genre, media_path FROM selected_images UNION SELECT post_id, caption, post_time, likes, genre, media_path FROM selected_videos) SELECT post_id, caption, post_time, likes, genre, STRING_AGG(media_path, '@') media_paths FROM post_links";

        $this->db->query($original_query . $groupby_query . " LIMIT 10");
        // if (sizeof($list) == 1) {
        // } else {
        //     // limit
        //     $limit_query = "";
            
        //     if (sizeof($list) == 5) {
        //         $limit_query .= " LIMIT 10 OFFSET " . ((((int)substr($list[1], 5)) - 1) * 10);
        //     } else {
        //         $limit_query .= " LIMIT 10";
        //     }

        //     $this->db->query($original_query . $groupby_query . $limit_query);
        // }

        return $this->db->resultSet();
    }

    public function getAllCategories() {
        $this->db->query("SELECT DISTINCT genre FROM " . $this->post_table);
        return $this->db->resultSet();
    }

    public function getPostElements($postId) {
        $this->db->query('SELECT caption, descriptions, post_time, likes, genre FROM post WHERE post_id = ' . $postId . 'LIMIT 1');
        return $this->db->single();
    }
    
    public function addLikes($postId) {
        $this->db->query('UPDATE post SET likes = likes + 1 WHERE post_id = ' . $postId);
        $this->db->execute();
        
    }
    
    public function substractLikes($postId) {
        $this->db->query('UPDATE post SET likes = likes - 1 WHERE post_id = ' . $postId);
        $this->db->execute();
    }
    
    public function getLikes($postId) {
        $this->db->query('SELECT likes FROM post WHERE post_id = ' . $postId);
        return $this->db->single();
    }

    public function addPost($caption, $description, $postTime, $genre) {
        $this->db->query('INSERT INTO post (caption, descriptions, post_time, genre) VALUES (:caption, :descriptions, :post_time, :genre)');
        $this->db->bind('caption', $caption);
        $this->db->bind('descriptions', $description);
        $this->db->bind('post_time', $postTime);
        $this->db->bind('genre', $genre);
        $this->db->execute();
    }
    
    public function getLastPostId() {
        $this->db->query('SELECT post_id FROM post ORDER BY post_id DESC LIMIT 1;');
        return $this->db->single();      
    }
}