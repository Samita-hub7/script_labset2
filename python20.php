<?php
function addFirstThree($str) {
    $firstThree = substr($str, 0, 3);
    return $firstThree . $str . $firstThree;
}

echo addFirstThree("Python") . "<br>";
echo addFirstThree("JS") . "<br>";
echo addFirstThree("Code");
?>