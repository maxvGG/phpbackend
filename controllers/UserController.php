<?php

require_once 'models/User.php';
require_once 'models/Category.php';
require_once 'Database.php';

class UserController
{
    private $data;
    private $errors = [];
    private static $fields = ['email', 'password'];
    public function post($data)
    {
        $user = User::login($data['email'], $data['password']);
        if ($user) {
            return json_encode($user);
        }

        return json_encode(['todo' => 'Assignment 1: User Authentication']);
    }
    public function get($data)
    {
        $get = Category::getAll();
        if ($get) {
            return json_encode($get);
        }
    }
    // my functions 
    public function __construct($post_data)
    {
        $this->data = $post_data;
    }
    public function validateForm()
    {
        foreach (self::$fields as $field) {
            var_dump(self::$fields);
            // var_dump($this->data);
            var_dump(array_key_exists($field, $this->data));
            if (!array_key_exists($field, $this->data)) {
                echo ("$field is not present in data");
                return;
            }
        }
        $this->validateEmail();
        $this->validatePassword();
        return $this->errors;
    }
    public function validatePassword()
    {
        $val = trim($this->data['password']);

        if (empty($val)) {
            $this->addError('password', 'password cannot be empty');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{3,18}$/', $val)) {
                $this->addError('password', 'enter a valid password');
            }
        }
    }
    public function validateEmail()
    {
        $val = trim($this->data['email']);

        if (empty($val)) {
            $this->addError('email', 'email cannot be empty');
        } else {
            if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'enter a valid email');
            }
        }
    }

    public function addError($key, $val)
    {
        $this->error[$key] = $val;
    }
}

// email validation 
// password validation