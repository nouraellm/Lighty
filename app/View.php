<?php

namespace App;

/**
 * View Class
 */
class View 
{
	
	public function render($file, $include = false)
	{
		if($include){
            require_once __DIR__.'/../views/includes/Header.php';
            require_once __DIR__.'/../views/'.$file.'.php';
            require_once __DIR__.'/../views/includes/Footer.php';
		}
		require_once __DIR__.'/../views/'.$file.'.php';
	}
}
