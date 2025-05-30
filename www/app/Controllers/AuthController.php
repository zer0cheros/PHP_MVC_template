<?php

require_once APP_ROOT . '/app/Core/Session.php';
require_once APP_ROOT . '/app/Core/View.php';

class AuthController extends Controller
{
    public function index()
    {
        View::render('login', ['title' => 'Auth Page', 'content' => 'Welcome to the auth page!']);
    }

    public function login()
    {
        require_once APP_ROOT . '/app/Model/UserModel.php';
        require_once APP_ROOT . '/app/Core/API.php';
        $api = new API();
        if ($api->getMetod() !== 'POST') {
            echo "Invalid request method!";
            return;
        }
        $body = $api->getBody();
        $userModel = new UserModel();
        $user = $userModel->getUserByEmail($body['email']);
        if ($user) {
            if ($body['password'] === $user['password']) {
                Session::start();
                Session::set('user_id', $user['id']);
                Session::set('username', $user['username']);
                Session::set('is_logged_in', true);
                Session::set('role', $user['role']);
                header('Location: /user/profile/' . $user['id']);
                exit;
            } else {
                echo "Invalid password!";
            }
        } else {
            echo "User not found!";
        }
    }

    public function logout()
    {
        Session::start();
        Session::destroy();
        header('Location: /auth');
        exit;
    }
}