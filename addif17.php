<?php
function addIf($str) {
    if (substr($str, 0, 2) == "if") {
        return $str;
    } else {
        return "if " . $str;
    }
}

echo addIf("if else") . "<br>";
echo addIf("else") . "<br>";
echo addIf("if");
?>