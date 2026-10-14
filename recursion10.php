<?php

function stringLength($str)
{
    if ($str == "")
    {
        return 0;
    }
    else
    {
        return 1 + stringLength(substr($str, 1));
    }
}

$str = "Hello";

$result = stringLength($str);

echo "String: $str<br>";
echo "Length of string: $result";

?>