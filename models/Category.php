<?php

require_once 'Database.php';

class Category
{
    // get all gategories
    public static function getAll()
    {
        // check if there is an instance
        $db = Database::getInstance();
        // db query
        $res = $db->query('SELECT * FROM `categories`');
        // ORDER BY `categories`.`parent_id` ASC
        // if $res is more than 0 return all categories
        if (count($res) > 0) {
            return $res;
        }

        return [];
    }
}
