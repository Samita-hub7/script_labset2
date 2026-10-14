<?php

function getValue($array, $index)
{
    return $array[$index];
}

$numbers = array(10, 20, 30, 40, 50);

$index = 2;

$value = getValue($numbers, $index);

echo "Index = " . $index . "<br>";
echo "Value = " . $value;

?>