<?php

namespace App;

use \App\View as View;

/**
 * Errors Class
 */
class Errors
{
    /**
     * Constructor
     *
     * @return $this
     */
    public function __construct()
    {
        $this->index();
    }

    /**
     * Render errors/index view
     */
    public function index()
    {
        $this->view = new View();
        $this->view->render('errors/index', true);
    }
}
