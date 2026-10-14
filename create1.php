<?php

$name = "Samita";
$age = 22;
$height = 5.2;
$isStudent = true;

$colors = array("Red", "Green", "Blue");

// echo and print
echo "Name: " . $name . "<br>";
print "Age: " . $age . "<br>";

echo "Height: " . $height . "<br>";
print "Student: " . $isStudent . "<br>";

// print_r
echo "<h3>Using print_r</h3>";
print_r($colors);

// var_dump
echo "<h3>Using var_dump</h3>";
var_dump($colors);

// Check data types
echo "<h3>Data Types</h3>";

echo "Name: " . gettype($name) . "<br>";
echo "Age: " . gettype($age) . "<br>";
echo "Height: " . gettype($height) . "<br>";
echo "Student: " . gettype($isStudent) . "<br>";

?>