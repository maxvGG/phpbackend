<?php
// de data van 
require_once 'models/Category.php';

class CategoryController
{
    public function post($data)
    {
        return null;
    }

    public function get($data)
    {
        // TODO: Assignment 2
        return json_encode(Category::getAll());
    }
}
