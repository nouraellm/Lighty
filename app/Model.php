<?php

namespace App;

use \App\Database as Database;

/**
 *  Model Class
 */
class Model
{
    /**
     * Constructor
     *
     * @return $this
     */
    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Call a model
     * 
     * @param  string $file model filename
     */
    public function call($file)
    {
        require_once __DIR__.'/../models/'.$file.'.php';
    }
}
