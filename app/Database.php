<?php

namespace App;

use MYSQLi;

/**
 * Database class
 */
class Database extends MYSQLi
{
    /**
     * Constructor
     *
     * @return $this
     */
    public function __construct()
    {
        if (ENABLED) {
            parent::__construct(HOST, USERNAME, PASSWORD, DATABASE);
        }
    }
}
