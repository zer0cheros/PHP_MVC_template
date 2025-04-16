<?php
require_once APP_ROOT . '/app/Core/View.php';
require_once APP_ROOT . '/app/Core/AuthMiddleware.php';
require_once APP_ROOT . '/app/Model/BookingModel.php';
require_once APP_ROOT . '/app/Model/ServiceModel.php';
require_once APP_ROOT . '/app/Model/userModel.php';

class AdminController extends Controller 
{
    public $userModel;
    public $bookingModel;
    public $serviceModel;
    public function __construct() 
{
    $this->userModel = new UserModel();
    $this->bookingModel = new BookingModel();
    $this->serviceModel = new ServiceModel();

    AuthMiddleware::checkAuth();

    if (!AuthMiddleware::isAdmin()) {
        header('Location: /');
        exit;
    }
}
    public function index() 
    {
        AuthMiddleware::checkAuth();
        // Kontrollerar om användare är inloggad
        $user = AuthMiddleware::getUser();
        if (AuthMiddleware::isAdmin()) {
            // Hämtar alla bokningar för admin
            $bookings = $this->bookingModel->getAllBookings();
            // Hämtar alla tjänster för att visa i bokningsformuläret
            $services = $this->serviceModel->getAllServices();
            // Hämtar alla användare för att visa i adminpanelen
            $users = $this->userModel->getAllUsers();
            View::render('admin', ['title' => 'Admin Page', 'user' => $user, 'users' => $users, 'bookings' => $bookings, 'services' => $services]);
        } else {
            header('Location: /');
            exit;
        }
    }
    public function users($id = null) 
    {
        if ($id === null) {
            header('Location: /admin');
            return;
        }
        // Kontrollerar om användare är admin
        if (AuthMiddleware::isAdmin()) {
            // Hämtar alla bokningar för admin
            $bookings = $this->bookingModel->getBookingById($id);
            $user = $this->userModel->getUserById($id);
            $service = $this->serviceModel->getAllServices();
            View::render('admin_users', ['title' => 'Admin Users Page', 'user' => $user, 'booking' => $bookings, 'service' => $service]);
        } else {
            header('Location: /');
            exit;
        }
    }
}