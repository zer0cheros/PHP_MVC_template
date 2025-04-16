<?php

require_once APP_ROOT . '/app/Core/View.php';
require_once APP_ROOT . '/app/Model/UserModel.php';
require_once APP_ROOT . '/app/Core/AuthMiddleware.php';
class UserController extends Controller
{
    public function index()
    {
        View::render('user', ['title' => 'User Page', 'content' => 'Welcome to the user page!']);
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
        View::render('user_profile', ['title' => "User Profile", 'user' => $user]);
    }
    public function updateRole()
{
    header('Content-Type: application/json');

    AuthMiddleware::checkAuth();
    $user = AuthMiddleware::getUser();

    if ($user['role'] !== 'admin') {
        http_response_code(403);
        echo json_encode(['error' => 'Unauthorized']);
        return;
    }

    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['user_id']) || !isset($data['new_role'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing parameters']);
        return;
    }

    $userModel = new UserModel();
    $success = $userModel->updateRole($data['user_id'], $data['new_role']);

    if ($success) {
        echo json_encode(['success' => true]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to update role']);
    }
}
}