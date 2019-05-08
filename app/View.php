<?php

namespace App;

/**
 * View Class
 */
class View 
{
    /**
     * Render a view
     * 
     * @param  string  $file    view filename
     * @param  boolean $include includes header & footer also with the view
     */
    public function render($file, $include = false)
    {
        if ($include) {
            require_once __DIR__.'/../views/includes/Header.php';
            require_once __DIR__.'/../views/'.$file.'.php';
            require_once __DIR__.'/../views/includes/Footer.php';
        }

        require_once __DIR__.'/../views/'.$file.'.php';
    }
}
