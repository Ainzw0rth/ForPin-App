<?php

class Subscription_model {
    private $table = 'subscription';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    public function getAll() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getSubscription($id) {
        $this->db->query('SELECT * FROM' . $this->table .  'WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function addSubscription($creator_id, $subscriber_id) {
        $this->db->query('INSERT INTO' . $this->table . '(creator_id, subscriber_id) VALUES (:creator_id, :subscriber_id)');
        $this->db->bind('creator_id', $creator_id);
        $this->db->bind('subscriber_id', $subscriber_id);
        $this->db->execute();
    }

    public function updateSubscriptionStatus($creator_id, $subscriber_id, $status) {
        $this->db->query('UPDATE' . $this->table .  'SET status = :status WHERE creator_id=:creator_id AND subscriber_id=:subscriber_id');
        $this->db->bind('status', $status);
        $this->db->bind('creator_id', $creator_id);
        $this->db->bind('subscriber_id', $subscriber_id);
        $this->db->execute();
    }
}