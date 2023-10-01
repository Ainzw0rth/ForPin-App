<?php


class Home extends Controller {
    public function index() {
        $data['user'] = $this->model('User_model')->getUser();
        $this->view('home/index', $data);
    }
}