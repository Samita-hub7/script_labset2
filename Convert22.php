<?php
function upperLastThree($str) {
    $len = strlen($str);

    if ($len <= 3) {
        return strtoupper($str);
    }

    $firstPart = substr($str, 0, $len - 3);
    $lastPart = strtoupper(substr($str, -3));

    return $firstPart . $lastPart;
}

echo upperLastThree("Nepal") . "<br>";
echo upperLastThree("Npl") . "<br>";
echo upperLastThree("Bca") . "<br>";
echo upperLastThree("Bachelor");
?>