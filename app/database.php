<?php

namespace App;

use MYSQLi;

class Database extends MYSQLi
{
    public function __construct()
    {
        if (ENABLED) {
            parent::__construct(HOST, USERNAME, PASSWORD, DATABASE );
        }
    }
}
