<?php

require_once 'config.php';

class Database
{
    private static $instance;

    private function __construct()
    {
        // singelton 
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public static function getInstance()
    {
        // check if there already is a db instance loaded
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function query($query)
    {
        // get and return all db rows
        $rows = [];
        $result = $this->mysqli->query($query);
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $result->close();
        return $rows;
    }
}
