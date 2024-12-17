<?php

require_once APP_ROOT . '/app/Core/View.php';

class HomeController extends Controller
{
    public function index()
    {
        View::render('home', ['title' => 'Welcome to MyMVCApp']);
    }
}