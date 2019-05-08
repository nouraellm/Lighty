<?php

namespace App;

use \App\View as View;
use \App\Model as Model;

/**
 * Controller class
 */
class Controller
{
    /**
     * Constructor
     *
     * @return $this
     */
    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }
}
