<?php

function calculateDifference($n)
{
    $difference = abs($n - 51);

    if ($n > 51) {
        return $difference * 3;
    }
    else {
        return $difference;
    }
}

$n = 60;

$result = calculateDifference($n);

echo "Number = " . $n . "<br>";
echo "Result = " . $result;

?>