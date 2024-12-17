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
            header('Location: /');
            return;
        }
        require_once APP_ROOT . '/app/Model/UserModel.php';
        $userModel = new UserModel();
        $user = $userModel->getUserById($id);
        if (!$user) {
            header('Location: /');
            return;
        }
        if($user['id'] !== Session::get('user_id')) {
            header('Location: /user/profile/' . Session::get('user_id'));
        }
        $this->view('user_profile', ['title' => "User Profile", 'user' => $user]);
    }
}