<?php
require_once APP_ROOT . '/app/Core/View.php';
require_once APP_ROOT . '/app/Core/AuthMiddleware.php';
require_once APP_ROOT . '/app/Model/BookingModel.php';
require_once APP_ROOT . '/app/Model/ServiceModel.php';

class BookingController extends Controller
{
    public function index() 
    {
        AuthMiddleware::checkAuth();
        // Kontrollerar om användare är inloggad
        $user = AuthMiddleware::getUser();
        $bookingModel = new BookingModel();
        // Hämtar bokningar för den inloggade användaren
        $bookings = $bookingModel->getBookingById($user['id']);
        $serviceModel = new ServiceModel();
        // Hämtar alla tjänster för att visa i bokningsformuläret
        $services = $serviceModel->getAllServices();
        View::render('booking', ['title' => 'Booking Page', 'user' => $user, 'bookings' => $bookings, 'services' => $services]);
    }
    public function add()
    {
        AuthMiddleware::checkAuth();
        // Kontrollerar om användare är inloggad
        $user = AuthMiddleware::getUser();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookingModel = new BookingModel();
            $body = $_POST;
            $bookingModel->createBooking($body, $user['id']);
            // Om bokningen skapades framgångsrikt, omdirigera till bokningssidan
            header('Location: /booking');
            exit;
        } else {
            // Om det inte är en POST-begäran, visa bokningsformuläret
            header('Location: /booking');
        }
    }

}