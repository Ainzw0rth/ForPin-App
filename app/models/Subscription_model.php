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
        $this->db->query('SELECT * FROM ' . $this->table .  ' WHERE creator_username=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function addSubscription($creator_username, $subscriber_username) {
        $this->db->query('INSERT INTO ' . $this->table . ' (creator_username, subscriber_username) VALUES (:creator_username, :subscriber_username)');
        $this->db->bind('creator_username', $creator_username);
        $this->db->bind('subscriber_username', $subscriber_username);
        $this->db->execute();
    }

    public function updateSubscriptionStatus($creator_username, $subscriber_username, $status) {
        $this->db->query('UPDATE ' . $this->table .  ' SET status = :status WHERE creator_username=:creator_username AND subscriber_username=:subscriber_username');
        $this->db->bind('status', $status);
        $this->db->bind('creator_username', $creator_username);
        $this->db->bind('subscriber_username', $subscriber_username);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function checkSubscriptionStatus($creator_username, $subscriber_username) {
        $this->db->query('SELECT status FROM '. $this->table . ' WHERE creator_username=:creator_username AND subscriber_username=:subscriber_username');
        $this->db->bind('creator_username', $creator_username);
        $this->db->bind('subscriber_username', $subscriber_username);
        $status = $this->db->single();

        if ($status) {
            return $status;
        }
        return 0;
    }
}