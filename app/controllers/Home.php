<?php


class Home extends Controller {
    public function index($search = "' '") {
        try {
            $data['search'] = $search;
            $data['category'] = $this->model('Post_model')->getAllCategories();
            $data['posts'] = $this->model('Post_model')->getAll($search);

            $this->view('home/index', $data);

        } catch (Exception $e) {

        }
    }
}