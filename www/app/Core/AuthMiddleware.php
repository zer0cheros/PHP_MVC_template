<?php

require_once APP_ROOT . '/app/Core/Session.php';

class AuthMiddleware
{
    public static function handle($callback)
    {
        $callback();
    }
    public static function checkAuth()
    {
        if (!Session::get('is_logged_in')) {
            header('Location: /auth');
            exit;
        }
    }
    public static function getUser() {
        if (Session::get('is_logged_in')) {
            return [
                'id' => Session::get('user_id'),
                'username' => Session::get('username')
            ];
        }
        return null;
    }
}