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
        $this->db = new Database();
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

    /**
     * Set query conditions
     * 
     * @param  array  $conditions  Ex: ['name' => 'test', 'description' => 'bla bla bla', ...]
     * @return String $query       EX: WHERE 1 AND `id` = 1 AND .... 
     */
    public function setQueryConditions($conditions = [])
    {
        $query = " WHERE 1 ";
        foreach ($conditions as $key => $condition) {
            $query .= " AND `" . $key . "` = '" $condition . "'";
        }

        return $query;
    }
}
