<?php

require_once 'models/User.php';
require_once 'models/Category.php';
require_once 'CategoryController.php';
require_once 'Database.php';

class UserController
{
    private $data;
    public $errors = [];
    private static $fields = ['email', 'password'];

    public function __construct($post_data)
    {
        // save post data so we can easily use it
        $this->data = $post_data;
    }

    public function addError($key, $val)
    {
        // save all errors
        $this->errors[$key] = $val;
    }

    private function userlogin($data)
    {
        // nu een mysql statement maken om te zorgen dat het in de db word gedaan
        if (empty($this->errors)) {
            $user = User::login($data['email'], $data['password']);
            if ($user) {
                // hier de code voor het redirecten/ als de user is ingelogd 
                return var_dump($user);
            }

            return json_encode(['todo' => 'an unexcepted error occurred please try loggin in again']);
        }
    }
    public function get()
    {
        return Null;
    }

    public function post()
    {
        // foreach field we want to check
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
            }
        }
        // validate email and password
        $this->validateEmail();
        $this->validatePassword();
        $this->userlogin($this->data);
        return $this->errors;
    }
    public function validatePassword()
    {
        // trim password so there are no accidental spaces
        $val = trim($this->data['password']);

        // if password is empty return it to the var errors
        if (empty($val)) {
            $this->addError('password', 'password cannot be empty');
        } else {
            // check if the pasword is 'legal'
            if (!preg_match('/^[a-zA-Z0-9]{3,18}$/', $val)) {
                $this->addError('password', 'enter a valid password');
            }
        }
    }
    public function validateEmail()
    {
        // trim email so there are no accidental spaces
        $val = trim($this->data['email']);

        if (empty($val)) {
            $this->addError('email', 'email cannot be empty');
        } else {
            if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'enter a valid email');
            }
        }
    }
}

// email validation
// password validation
