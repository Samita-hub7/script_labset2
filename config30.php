<?php

$conn = mysqli_connect("localhost", "root", "", "employee_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<?php
include "config30.php";

$name = "Ram Bahadur";
$rank = "Manager";
$status = "Active";
$created_by = "Admin";

$sql = "INSERT INTO employees
        (name, rank, status, created_by)
        VALUES
        ('$name', '$rank', '$status', '$created_by')";

if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>