<?php

class User_model {
    private $table = 'asal';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    public function getUser() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}