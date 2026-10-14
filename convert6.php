<?php

function ageInDays($age) {

    return $age * 365;
}

$age = 22;

echo "Age in days = " . ageInDays($age);

?>