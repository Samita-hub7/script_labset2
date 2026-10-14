<?php

function calculateArea($base, $height, $shape)
{
    if ($shape == "triangle") {
        return 0.5 * $base * $height;
    }
    elseif ($shape == "parallelogram") {
        return $base * $height;
    }
    else {
        return "Invalid shape";
    }
}

$base = 10.5;
$height = 6.5;
$shape = "triangle";

$area = calculateArea($base, $height, $shape);

echo "Base = " . $base . "<br>";
echo "Height = " . $height . "<br>";
echo "Shape = " . $shape . "<br>";
echo "Area = " . $area;
?>