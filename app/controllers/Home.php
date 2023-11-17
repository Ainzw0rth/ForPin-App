<?php


class Home extends Controller {
    public function index($search = "' '") {
        if ( isset($_SESSION['user_id']) ) {
            try {
                $data['search'] = $search;
                $data['base'] = "http://localhost:80/home/";
                $data['user'] = $this->model('User_model')->getUserDesc($_SESSION['user_id']);
                $data['amount'] = $this->model('Post_model')->getAmount($search);
                $data['category'] = $this->model('Post_model')->getAllCategories();
                $data['posts'] = $this->model('Post_model')->getAll($search);
                $data['is_admin'] = $this->model('User_model')->getIsAdmin($_SESSION['user_id'])['is_admin'];
                $data['creator_username_upgrade'] =  $this->model('User_model')->getUsernameById($_SESSION['user_id'])['username'];
                $data['premium_desc'] = $this->model('Premium_model')->getPremiumDesc($data['creator_username_upgrade']);
                $rest_url = $_ENV['REST_URL'] . '/exclusiveContent';
                
                $channel = curl_init();
                curl_setopt($channel, CURLOPT_HTTPGET, true);
                curl_setopt($channel, CURLOPT_URL, $rest_url);
                curl_setopt($channel, CURLOPT_RETURNTRANSFER, 1);
                
                $response = curl_exec($channel);
                curl_close($channel);

                $data = json_decode($response, true);

                foreach ($data['data'] as $post) {
                    $postId = $post['post_id'];
                    $caption = $post['caption'];
                    $postTime = $post['post_time'];
                    $likes = $post['likes'];
                
                    $genre = isset($post['premium_user']['genre']) ? $post['premium_user']['genre'] : '';
                
                    $mediaPaths = [];
                
                    foreach ($post['exclusive_media'] as $media) {
                        $mediaPaths[] = $media['media_path'];
                    }
                
                    $mediaPathsString = implode('@', $mediaPaths);
                
                    $transformedPost = [
                        'post_id' => $postId,
                        'caption' => $caption,
                        'post_time' => $postTime,
                        'likes' => $likes,
                        'genre' => $genre,
                        'media_paths' => $mediaPathsString,
                    ];
                
                    // $data['posts'][] = $transformedPost;
                }

                var_dump($transformedPost);
                // $data['posts'][] = $transformedPost;
                // var_dump($data['posts']);
                

                $this->view('home/index', $data);    
            } catch (Exception $e) {
                http_response_code($e->getCode());
            }
        } else {
            header("Location: " . BASE_URL . "/user/login");
            exit;
        }
    }
    
}