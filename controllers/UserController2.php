<?php

require_once 'models/User.php';
require_once 'models/Category.php';
require_once 'Database.php';

class UserController
{
    public function post($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        if ($this->_specialChars($email) && $this->_specialChars($password)) {
            // echo $email;
            // $emailpassed1 = $email;
            // $passwordpassed1 = $password;

            // if ($this->_checkemail($emailpassed1)) {
            //     $email = $emailpassed1;
            //     echo $email;
            // } else {
            //     exit;
            // }
            // if ($this->_checkpassword($passwordpassed1)) {
            //     $password = $passwordpassed1;
            //     echo $password;
            // } else {
            //     exit;
            // }
            return true;
        }
        // $user = User::login($data['email'], $data['password']);
        // if ($user) {
        //     return json_encode($user);
        // }

        // return json_encode(['todo' => 'Assignment 1: User Authentication']);
    }
    // make sure that the post data is save for mysql
    // public function _mysqlRealEscapeString($string)
    // {
    //     $db = Database::getInstance();
    //     if (mysqli_real_escape_string($string, $db)) {
    //         return $string;
    //     }
    //     return json_encode(['password' => 'invalid']);
    // }

    // check for special Chars 
    public function _specialChars($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UFT-8');
    }
    // check email
    public function _checkemail($string)
    {
        $regex = '^(\w|\.|\_|\-)+[@](\w|\_|\-|\.)+[.]\w{2,3}$';
        if (!preg_match($regex, $string)) {
            return json_encode(['email' => 'invalid']);
        }
        return json_encode(['email' => 'valid']);
    }
    // check if password is 'save'
    public function _checkpassword($string)
    {
        return $string;
    }
    // 
    public function get($data)
    {
        // $get = Category::getAll();
        if ($get) {
            return json_encode($get);
        }
        return "no";
    }
}

// email validation 
// password validation