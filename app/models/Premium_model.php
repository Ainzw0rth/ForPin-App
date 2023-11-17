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
        $this->db->query('INSERT INTO premium (creator_username) VALUES (:id)');
        $this->db->bind('id', $id);
        $this->db->execute();
    }

    public function updatePremiumStatus($id, $status) {
        $this->db->query('UPDATE premium SET status = :status WHERE creator_username=:id');
        $this->db->bind('status', $status);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function checkPremium($creator_username) {
        $this->db->query('SELECT * FROM premium WHERE creator_username=:creator_username');
        $this->db->bind('creator_username', $creator_username);
        $user = $this-> db->single();
        if ($user) {
            if ($user['status'] === 'ACCEPTED') {
                return 1;
            }
        }
        return 0;
    }

    public function getPremiumDesc($id) {
        $this->db->query('SELECT * FROM premium WHERE creator_username=:creator_username');
        $this->db->bind('creator_username', $id);
        return $this->db->single();
    }
}