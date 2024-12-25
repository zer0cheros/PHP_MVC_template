<?php

require_once APP_ROOT . '/app/Core/View.php';
require_once APP_ROOT . '/app/Core/Session.php';

class UserController extends Controller
{
    public function index()
    {
        View::render('user', ['title' => 'User Page', 'content' => 'Welcome to the user page!']);
    }
    public function profile($id = null)
    {
        if ($id === null) {
            Session::start();
            $id = Session::get('user_id');
            header('Location: /user/profile/' . $id);
        }
        require_once APP_ROOT . '/app/Model/UserModel.php';
        $userModel = new UserModel();
        $user = $userModel->getUserById($id);
        View::render('user_profile', ['title' => "User Profile", 'user' => $user]);
    }
}