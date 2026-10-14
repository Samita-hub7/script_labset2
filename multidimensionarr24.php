<?php
$students = [
    [1, "Rajesh", 25, 56, 89, 57, 64, 98, 364, "pass"],
    [2, "Hari", 5, 56, 89, 57, 64, 98, 364, "pass"],
    [3, "Shyam", 6, 54, 79, 57, 64, 98, 357, "pass"],
    [4, "Rita", 10, 16, 89, 56, 69, 98, 328, "fail"],
    [5, "Gita", 18, 56, 89, 57, 24, 98, 342, "fail"],
    [6, "Sita", 24, 56, 89, 57, 24, 98, 334, "fail"],
    [7, "Sita", 24, 56, 89, 57, 24, 98, 334, "fail"],
    [8, "Sita", 24, 56, 89, 57, 24, 98, 334, "fail"]
];
?>

<!DOCTYPE html>
<html>
<head>

<title>Mark Ledger</title>

<style>

table {
    border-collapse: collapse;
    width: 80%;
}

th, td {
    border: 1px solid black;
    padding: 5px;
    text-align: center;
}

/* First table */
.pass {
    background-color: #00ff99;
}

.fail {
    background-color: red;
}

/* Alternate table */
.alternate tr:nth-child(even) {
    background-color: #cccccc;
}

.alternate tr:nth-child(odd) {
    background-color: white;
}

.alternate .pass {
    background-color: #00ff99;
}

.alternate .fail {
    background-color: red;
}

</style>

</head>

<body>

<h3>Mark Ledger</h3>

<!-- FIRST TABLE -->

<table>

<tr>
    <th>SN</th>
    <th>Name</th>
    <th>Roll</th>
    <th>Web Tech II</th>
    <th>DBMS</th>
    <th>Economics</th>
    <th>DSA</th>
    <th>Account</th>
    <th>Total</th>
    <th>Result</th>
</tr>

<?php
foreach ($students as $student) {

    $class = $student[9];

    echo "<tr class='$class'>";

    foreach ($student as $value) {
        echo "<td>$value</td>";
    }

    echo "</tr>";
}
?>

</table>


<br>

<h3>Alternate color</h3>

<!-- SECOND TABLE -->

<table class="alternate">

<tr>
    <th>SN</th>
    <th>Name</th>
    <th>Roll</th>
    <th>Web Tech II</th>
    <th>DBMS</th>
    <th>Economics</th>
    <th>DSA</th>
    <th>Account</th>
    <th>Total</th>
    <th>Result</th>
</tr>

<?php
foreach ($students as $student) {

    echo "<tr>";

    for ($i = 0; $i < count($student); $i++) {

        if ($i == 9) {
            echo "<td class='" . $student[9] . "'>";
        } else {
            echo "<td>";
        }

        echo $student[$i];
        echo "</td>";
    }

    echo "</tr>";
}
?>

</table>

</body>
</html>