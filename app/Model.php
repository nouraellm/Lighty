<?php

namespace App;

use \App\Database as Database;

/*
 *  Model Class
 */

class Model{

	public function __construct(){
		$this->db = new Database;
	}
	public function call($file){
		require_once __DIR__.'/../models/'.$file.'.php';
	}
}
