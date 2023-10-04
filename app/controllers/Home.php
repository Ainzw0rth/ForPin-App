<?php


class Home extends Controller {
    public function index($search = "?") {
        try {
            $data['search'] = $search;
            $data['posts'] = $this->model('Post_model')->getAll();

            $this->view('home/index', $data);

        } catch (Exception $e) {

        }
    }
}