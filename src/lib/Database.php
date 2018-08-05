<?php


class Database extends PDO {

    public function __construct() {

        try {
            $dsn = DB_TYPE . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME;

            $username = DB_USER;
            $passwd = DB_PASS;
    
            parent::__construct($dsn, $username, $passwd /*, $options */);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

}

