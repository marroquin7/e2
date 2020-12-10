<?php
namespace App\Controllers;

class AppController extends Controller
{
    public function index()
    {   #Main display - Home Page
        return $this->app->view('index');
    }
}