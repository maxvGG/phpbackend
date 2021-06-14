<?php

require_once 'Database.php';

class User
{
    // login
    public static function login($email, $password)
    {
        // check if there already is a db instance 
        $db = Database::getInstance();
        // db query
        $res = $db->query('SELECT * FROM users WHERE email = "' . $email . '" AND password = "' . $password . '"');

        // return $res if there is 1 user otherwise return nothing
        if (count($res) === 1) {
            return $res[0];
        }

        return false;
    }
}
