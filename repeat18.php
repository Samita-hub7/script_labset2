<?php
function copyFirstTwo($str) {
    if (strlen($str) < 2) {
        return $str;
    }

    $firstTwo = substr($str, 0, 2);
    return $firstTwo . $firstTwo . $firstTwo . $firstTwo;
}

echo copyFirstTwo("C Sharp") . "<br>";
echo copyFirstTwo("JS") . "<br>";
echo copyFirstTwo("a");
?>