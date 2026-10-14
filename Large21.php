<?php
$a = 25;
$b = 10;
$c = 40;

if ($a >= $b && $a >= $c) {
    $largest = $a;
} elseif ($b >= $a && $b >= $c) {
    $largest = $b;
} else {
    $largest = $c;
}

echo "Largest number = " . $largest;
?>