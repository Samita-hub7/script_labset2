<?php

function findIndex($array, $string)
{
    return array_search($string, $array);
}

$names = array("Ram", "Sita", "Hari", "Krishna");

$string = "Hari";

$index = findIndex($names, $string);

echo "String = " . $string . "<br>";
echo "Index = " . $index;

?>