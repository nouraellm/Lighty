<?php

namespace App;

use MYSQLi;

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
