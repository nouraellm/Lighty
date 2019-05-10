<?php

use \App\Controller as Controller;
use \Models\Home as Home;

/**
 * HomeController Class
 */
class HomeController extends Controller
{
    /**
     * Constructor
     *
     * @return $this
     */
    public function __construct()
    {
        parent::__construct();
        $this->model->call('Home');
        $this->home = new Home();
    }

    /**
     * Render Welcome view
     * 
     */
    public function index()
    {
        $this->view->msg = 'v.1.0';
        $this->view->render('Welcome', true);
    }

    /**
     * Render errors index
     *
     */
    public function __404()
    {
        $this->view->msg = '404 Not Found';
        $this->view->render('errors/index');
    }
}
