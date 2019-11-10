<?php

namespace Citrus\Init;

use \PDO;
use \PDOException;

class Model {
    private static $instance = null;
    protected $db_name = '';
    protected $connection;

    protected function __construct($db_name = DB_NAME)
    {
        $this->db = $db_name;
        $this->connection = $this->connect();
    }

    private function connect()
    {
        if (!self::$instance) {
            try{
                self::$instance = new PDO("mysql:host=".DB_HOST.";dbname=$this->db_name;charset=utf8",DB_USERNAME,DB_PASSWORD);
            }catch (PDOException $e) {
                die('Connection faild... '.$e->getMessage());
            }
        }
        return self::$instance;
    }
}
