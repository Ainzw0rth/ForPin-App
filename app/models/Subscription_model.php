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
        $this->db->query('SELECT * FROM ' . $this->table .  ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function addSubscription($creator_name, $subscriber_name) {
        $this->db->query('INSERT INTO ' . $this->table . ' (creator_name, subscriber_name) VALUES (:creator_name, :subscriber_name)');
        $this->db->bind('creator_name', $creator_name);
        $this->db->bind('subscriber_name', $subscriber_name);
        $this->db->execute();
    }

    public function updateSubscriptionStatus($creator_username, $subscriber_username, $status) {
        $this->db->query('UPDATE ' . $this->table .  ' SET status = :status WHERE creator_name=:creator_name AND subscriber_name=:subscriber_name');
        $this->db->bind('status', $status);
        $this->db->bind('creator_name', $creator_username);
        $this->db->bind('subscriber_name', $subscriber_username);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function checkSubscriptionStatus($creator_name, $subscriber_name) {
        $this->db->query('SELECT status FROM '. $this->table . ' WHERE creator_name=:creator_name AND subscriber_name=:subscriber_name');
        $this->db->bind('creator_name', $creator_name);
        $this->db->bind('subscriber_name', $subscriber_name);
        $status = $this->db->single();

        if ($status) {
            return $status;
        }
        return 0;
    }
}