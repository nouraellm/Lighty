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


       return $this->render('Welcome', ['name' => 'Lighty']);;
    }

    /**
     * Render errors index
     *
     */
    public function __404()
    {



        $this->render('errors/index');
    }
}
