<?php

namespace App;

/**
 * Errors Class
 */
class Errors
{

	public function render()
	{
		$this->view = new View();
		return $this->view->render('errors/index.html.twig', []);
	}
}
