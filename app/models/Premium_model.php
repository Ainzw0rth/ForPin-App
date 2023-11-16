<?php

class Premium_model {
    private $table = 'premium';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    public function getAll() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPremiumUser($id) {
        $this->db->query('SELECT * FROM premium WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function addPremiumUser($id) {
        $this->db->query('INSERT INTO premium (creator_id) VALUES (:id)');
        $this->db->bind('id', $id);
        $this->db->execute();
    }

    public function updatePremiumStatus($id, $status) {
        $this->db->query('UPDATE premium SET status = :status WHERE id=:id');
        $this->db->bind('status', $status);
        $this->db->bind('id', $id);
    }

    public function checkPremium($id) {
        $this->db->query('SELECT * FROM premium WHERE creator_id=:creator_id');
        $this->db->bind('creator_id', $id);
        $user = $this-> db->single();
        if ($user) {
            if ($user['status'] === 'ACCEPTED') {
                return 1;
            }
        }
        return 0;
    }
}