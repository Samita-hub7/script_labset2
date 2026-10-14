<?php

function calculateSum($num1, $num2)
{
    if ($num1 == $num2) {
        return 3 * ($num1 + $num2);
    }
    else {
        return $num1 + $num2;
    }
}

$num1 = 10;
$num2 = 10;

$result = calculateSum($num1, $num2);

echo "First Number = " . $num1 . "<br>";
echo "Second Number = " . $num2 . "<br>";
echo "Result = " . $result;

?>