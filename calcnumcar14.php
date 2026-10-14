<?php

function carsNeeded($people)
{
    return ceil($people / 5);
}

$people = 12;

$cars = carsNeeded($people);

echo "Number of People = " . $people . "<br>";
echo "Cars Needed = " . $cars;

?>