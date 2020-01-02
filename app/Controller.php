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
       
        $this->model = new Model();
    }

    public  function render($file_template, $arr_var=[])
    {
          $view = new View();
          
          $file = explode(".",$file_template);

          return $view->render($file[0].".html.twig", $arr_var);
    }

    
}
