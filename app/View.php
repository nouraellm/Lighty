<?php

namespace App;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
/**
 * View Class
 */
class View 
{
    /**
     * Render a view
     * 
     * @param  string  $file    view filename
     * @param  boolean $include includes header & footer also
     */
    private $loader;
    private $twig;

    function __construct()
    {
        $this->loader = new FilesystemLoader(__DIR__ .'/../views/');
        $this->twig = new Environment($this->loader);

    }
    public function render($file_template, $arr_var=[])
    {
     
        return $this->twig->render($file_template, $arr_var);
    }
}
