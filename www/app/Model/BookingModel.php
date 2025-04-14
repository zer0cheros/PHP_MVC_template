<?php
require_once APP_ROOT . '/app/Core/Database.php';

class BookingModel 
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllBookings()
    {
        $this->db->query('SELECT * FROM bookings');
        return $this->db->resultSet();
    }
    public function getBookingById($id)
    {
        $this->db->query('SELECT * FROM bookings WHERE user_id = :id');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }
    public function createBooking($data, $userId)
{
    $this->db->query('INSERT INTO bookings (user_id, booking_date, booking_time, service_id) 
                      VALUES (:user_id, :booking_date, :booking_time, :service_id)');
    $this->db->bind(':user_id', $userId);
    $this->db->bind(':booking_date', $data['booking_date']);
    $this->db->bind(':booking_time', $data['booking_time']);
    $this->db->bind(':service_id', $data['service_id']);
    return $this->db->execute();
}   
    public function updateBooking($id, $data)
    {
        $this->db->query('UPDATE bookings SET booking_date = :booking_date, status = :status WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':booking_date', $data['booking_date']);
        $this->db->bind(':status', $data['status']);
        return $this->db->execute();
    }
}