<?php

class Controller
{
    public function view($view, $data = [])
    {
        $viewPath = APP_ROOT . '/app/Views/' . $view . '.php';

        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "View file not found: " . $viewPath; // Debug output
        }
    }
}