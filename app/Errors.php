<?php

namespace App;

use \App\View as View;

/*
 * Errors Class
 */
class Errors{

    public function __construct()
    {
        $this->index();
    }
    public function index()
    {
        $this->view = new View;
        $this->view->render('errors/index', true);
    }
}
