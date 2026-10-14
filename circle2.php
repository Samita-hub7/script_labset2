<!DOCTYPE html>
<html>
<body>

<form method="post">

    Enter Radius:
    <input type="number" name="radius">

    <button type="submit">Calculate</button>

</form>

<?php

define("PI", 3.1416);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $radius = $_POST["radius"];

    $area = PI * $radius * $radius;

    echo "<h3>Area of Circle = $area</h3>";
}

?>

</body>
</html>