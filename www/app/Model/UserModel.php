<?php
require_once APP_ROOT . '/app/Core/Database.php';

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM Person WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}