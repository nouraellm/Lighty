<?php

namespace App;

/**
 * Controller class
 */
class Controller
{
	/** @var View */
	protected $view;

	/** @var Model */
	protected $model;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->view = new View();
		$this->model = new Model();
	}

	public function render($file_template, $arr_var = [])
	{
		$file = explode(".", $file_template);
		return $this->view->render($file[0] . ".html.twig", $arr_var);
	}

}
