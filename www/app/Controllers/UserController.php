<?php


class UserController extends Controller
{
    public function index()
    {
        $this->view('user', ['title' => 'User Page', 'content' => 'Welcome to the user page!']);
    }
    public function profile($id = null)
    {
        if ($id === null) {
            echo "User ID not provided.";
            return;
        }
        require_once APP_ROOT . '/app/Model/UserModel.php';
        $userModel = new UserModel();
        $user = $userModel->getUserById($id);
        $this->view('user_profile', ['title' => "User Profile", 'user' => $user]);
    }
}