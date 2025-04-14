<?php 

class API 
{
    public $metod = 'GET';
    public function __construct()
    {
        $this->metod = $_SERVER['REQUEST_METHOD'];
    }
    public function getMetod()
    {
        return $this->metod;
    }
    public function getBody()
    {
        $body = [];
        // ifall det är GET
        if ($this->metod === 'GET') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            // ifall det är POST
        } else if ($this->metod === 'POST') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        } else {
            $input = file_get_contents('php://input');
            $body = json_decode($input, true);
        }
        return $body;
    }
}