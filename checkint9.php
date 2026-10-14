<?php

function divisibleByFive($num)
{
    if ($num % 5 == 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}

$num = 25;

$result = divisibleByFive($num);

echo "Number: $num<br>";
echo "Result: " . ($result ? "true" : "false");

?>