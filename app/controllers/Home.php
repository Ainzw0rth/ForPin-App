<?php


class Home extends Controller {
    public function index() {
        try {
            $data['user'] = $this->model('User_model')->getAll();
            $this->view('home/index', $data);

        } catch (Exception $e) {
        }
    }
}