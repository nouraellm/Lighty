<?php

use \App\Controller as Controller;
use \Models\Home as Home;

/*
 * HomeController Class
 */
class HomeController extends Controller{
    public function __construct()
    {
        parent::__construct();
        $this->model->call('Home');
        $this->home = new Home;
    }

    public function index()
    {
        $this->view->msg = 'Lighty Framework';
        $this->view->render('Welcome');
    }
    public function __404()
    {
        $this->view->msg = '404 Not Found';
        $this->view->render('errors/index');
    }
}