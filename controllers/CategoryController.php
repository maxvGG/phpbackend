<?php
// de data van
require_once 'models/Category.php';

class CategoryController
{

    public function post($data)
    {
        $iterator = new RecursiveArrayIterator($data);

        while ($iterator->valid()) {

            if ($iterator->hasChildren()) {
                // print all children
                echo "<tr style='border: 1px solid black'>";
                foreach ($iterator->getChildren() as $key => $value) {
                    // if (!$value = null) {
                    echo "<td style='border: 1px solid black' loading='lazy'>" . $key . "</td>";
                    echo "<td style='border: 1px solid black' loading='lazy' class='value'>" . $value . "</td>";
                    // }
                }
                echo "</tr>";
            } else {
                echo "No children. \n";
            }
            $iterator->next();
        }
        // TODO: Assignment 2
        return Category::getAll();
    }

    public function get($data)
    {
        $iterator = new RecursiveArrayIterator($data);
        echo "category controller";
        while ($iterator->valid()) {

            if ($iterator->hasChildren()) {
                // print all children
                echo "<tr style='border: 1px solid black'>";
                foreach ($iterator->getChildren() as $key => $value) {
                    // if (!$value = null) {
                    echo "<td style='border: 1px solid black' loading='lazy'>" . $key . "</td>";
                    echo "<td style='border: 1px solid black' loading='lazy' class='value'>" . $value . "</td>";
                    // }
                }
                echo "</tr>";
            } else {
                echo "No children. \n";
            }
            $iterator->next();
        }
        // TODO: Assignment 2
        return Category::getAll();
    }
}
