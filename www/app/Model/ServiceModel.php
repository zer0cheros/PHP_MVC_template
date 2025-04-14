<?php
require_once APP_ROOT . '/app/Core/Database.php';

class ServiceModel 
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllServices()
    {
        $this->db->query('SELECT * FROM services');
        return $this->db->resultSet();
    }
}
