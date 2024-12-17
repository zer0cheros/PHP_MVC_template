<?php

class View
{
    public static function render($view, $data = [], $layout = 'layout')
    {
        extract($data);
        $layoutFile = APP_ROOT . "/public/{$layout}.php";
        $viewFile = APP_ROOT . "/app/Views/{$view}.php";

        if (!file_exists($viewFile)) {
            die("View file '{$viewFile}' not found.");
        }
        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        // inkuldera layout-filen
        if (file_exists($layoutFile)) {
            require $layoutFile;
        } else {
            die("Layout file '{$layoutFile}' not found.");
        }
    }
}