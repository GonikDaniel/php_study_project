<?php

class DatabaseConnection extends Singleton { 

    protected $connection; 

    protected function __construct() { 
        // @todo Connect to the database 
    }

    public function __destruct() { 
        // @todo Drop the connection to the database 
    }
} 