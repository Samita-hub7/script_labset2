<!DOCTYPE html>
<html>
<head>
<title>Mark Sheet</title>
</head>

<body>

<h2>Student Mark Sheet</h2>

<form method="post">

Name:
<input type="text" name="name" required><br><br>

Roll No:
<input type="text" name="rollno" required><br><br>

English:
<input type="number" name="english" min="0" max="100" required><br><br>

Math:
<input type="number" name="math" min="0" max="100" required><br><br>

Computer:
<input type="number" name="computer" min="0" max="100" required><br><br>

Web Technology:
<input type="number" name="web" min="0" max="100" required><br><br>

DBMS:
<input type="number" name="dbms" min="0" max="100" required><br><br>

<input type="submit" name="generate"
value="Generate Mark Sheet">

</form>

<?php

if (isset($_POST['generate'])) {

    $name = $_POST['name'];
    $rollno = $_POST['rollno'];

    $english = $_POST['english'];
    $math = $_POST['math'];
    $computer = $_POST['computer'];
    $web = $_POST['web'];
    $dbms = $_POST['dbms'];

    $total = $english + $math + $computer + $web + $dbms;

    $percentage = $total / 5;

    if ($percentage >= 80) {
        $grade = "A+";
    } elseif ($percentage >= 70) {
        $grade = "A";
    } elseif ($percentage >= 60) {
        $grade = "B+";
    } elseif ($percentage >= 50) {
        $grade = "B";
    } elseif ($percentage >= 40) {
        $grade = "C";
    } else {
        $grade = "F";
    }

    if ($percentage >= 40) {
        $result = "PASS";
    } else {
        $result = "FAIL";
    }

    echo "<hr>";

    echo "<h2>MARK SHEET</h2>";

    echo "Name: $name<br>";
    echo "Roll No: $rollno<br><br>";

    echo "<table border='1' cellpadding='10'>";

    echo "<tr>
            <th>Subject</th>
            <th>Marks</th>
          </tr>";

    echo "<tr><td>English</td><td>$english</td></tr>";
    echo "<tr><td>Math</td><td>$math</td></tr>";
    echo "<tr><td>Computer</td><td>$computer</td></tr>";
    echo "<tr><td>Web Technology</td><td>$web</td></tr>";
    echo "<tr><td>DBMS</td><td>$dbms</td></tr>";

    echo "<tr>
            <th>Total</th>
            <th>$total / 500</th>
          </tr>";

    echo "<tr>
            <th>Percentage</th>
            <th>$percentage%</th>
          </tr>";

    echo "<tr>
            <th>Grade</th>
            <th>$grade</th>
          </tr>";

    echo "<tr>
            <th>Result</th>
            <th>$result</th>
          </tr>";

    echo "</table>";
}

?>

</body>
</html>