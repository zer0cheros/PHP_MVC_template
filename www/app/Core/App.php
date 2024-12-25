<?php
require_once APP_ROOT . '/app/Core/AuthMiddleware.php';

class App
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
{
    $url = $this->parseUrl();

    if (isset($url[0]) && file_exists(APP_ROOT . '/app/Controllers/' . $url[0] . 'Controller.php')) {
        $this->controller = $url[0] . 'Controller';
        unset($url[0]);
    } else {
        $this->controller = 'HomeController';
    }

    require_once APP_ROOT . '/app/Controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;
    if ($this->controller instanceof UserController) {
        AuthMiddleware::handle(function () {
            AuthMiddleware::checkAuth();
        });
    }
    if (isset($url[1]) && method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
    } else {
        $this->method = 'index';
    }
    $this->params = $url ? array_values($url) : [];
    call_user_func_array([$this->controller, $this->method], $this->params);
}

    private function parseUrl()
{
    if (isset($_GET['url'])) {
        $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        return $url;
    }
    return [];
}
}