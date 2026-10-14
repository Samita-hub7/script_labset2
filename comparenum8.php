<?php

function checkLength($str1, $str2)
{
    if (strlen($str1) == strlen($str2))
    {
        return true;
    }
    else
    {
        return false;
    }
}

$str1 = "Hello";
$str2 = "World";

$result = checkLength($str1, $str2);

echo "First String: $str1<br>";
echo "Second String: $str2<br>";
echo "Result: " . ($result ? "true" : "false");

?>