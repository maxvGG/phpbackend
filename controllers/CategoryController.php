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
        $iterator = new RecursiveArrayIterator($data);

        while ($iterator->valid()) {

            if ($iterator->hasChildren()) {
                // print all children
                echo "<tr style='border: 1px solid black'>";
                foreach ($iterator->getChildren() as $key => $value) {
                    echo "<td style='border: 1px solid black' loading='lazy'>" . $key . "</td>";
                    echo "<td style='border: 1px solid black' loading='lazy'>" . $value . "</td>";
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
