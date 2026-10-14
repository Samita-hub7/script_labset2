<!DOCTYPE html>
<html>
<head>
<title>Simple Interest</title>
</head>

<body>

<h2>Simple Interest Calculator</h2>

<form method="post">

Principal:
<input type="number" name="p" required><br><br>

Time:
<input type="number" name="t" required><br><br>

Rate:
<input type="number" name="r" required><br><br>

<input type="submit" name="calculate"
value="Calculate">

</form>

<?php

if (isset($_POST['calculate'])) {

    $p = $_POST['p'];
    $t = $_POST['t'];
    $r = $_POST['r'];

    $si = ($p * $t * $r) / 100;

    $amount = $p + $si;

    echo "<h3>Result</h3>";

    echo "Principal = Rs. $p<br>";
    echo "Time = $t years<br>";
    echo "Rate = $r%<br>";
    echo "Simple Interest = Rs. $si<br>";
    echo "Total Amount = Rs. $amount";
}

?>

</body>
</html>