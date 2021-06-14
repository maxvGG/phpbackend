<?php
$fruits = array(
    "a" => array("b" => 'banana'), "o" => "orange",
    array(
        "a" => "apple", "p" => "pear",
    ),
);

$iterator = new RecursiveArrayIterator($fruits);

while ($iterator->valid()) {

    if ($iterator->hasChildren()) {
        // print all children
        foreach ($iterator->getChildren() as $key => $value) {
            echo $key . ' : ' . $value . "\n";
        }
    } else {
        echo "No children.\n";
    }

    $iterator->next();
}
