<?php

$conn = mysqli_connect("localhost", "root", "", "php_lab");

if (!$conn) {
    die("Connection failed");
}

/* ADD COURSE */
if (isset($_POST['add_course'])) {

    $title = $_POST['title'];
    $duration = $_POST['duration'];
    $status = $_POST['status'];

    if (empty($title) || empty($duration)) {
        echo "Please fill course details.<br>";
    } else {

        $sql = "INSERT INTO courses
                (title, duration, status)
                VALUES
                ('$title', '$duration', '$status')";

        mysqli_query($conn, $sql);

        echo "Course added successfully.<br><br>";
    }
}

/* ADD STUDENT */
if (isset($_POST['add_student'])) {

    $name = $_POST['name'];
    $course_id = $_POST['course_id'];
    $fee = $_POST['fee'];
    $rollno = $_POST['rollno'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $status = $_POST['student_status'];

    if (empty($name) || empty($course_id) || empty($rollno)) {
        echo "Please fill required student fields.<br>";
    } else {

        $sql = "INSERT INTO students
        (name, course_id, fee, rollno, phone, address, dob, status)
        VALUES
        ('$name', '$course_id', '$fee', '$rollno',
         '$phone', '$address', '$dob', '$status')";

        mysqli_query($conn, $sql);

        echo "Student added successfully.<br><br>";
    }
}

/* DELETE COURSE */
if (isset($_GET['delete_course'])) {

    $id = $_GET['delete_course'];

    mysqli_query($conn,
        "DELETE FROM courses WHERE id=$id");

    echo "Course deleted successfully.<br><br>";
}

/* DELETE STUDENT */
if (isset($_GET['delete_student'])) {

    $id = $_GET['delete_student'];

    mysqli_query($conn,
        "DELETE FROM students WHERE id=$id");

    echo "Student deleted successfully.<br><br>";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Course and Student CRUD</title>
</head>

<body>

<h2>Add Course</h2>

<form method="post">

Title:
<input type="text" name="title" required><br><br>

Duration:
<input type="text" name="duration" required><br><br>

Status:
<select name="status">
    <option value="Active">Active</option>
    <option value="Inactive">Inactive</option>
</select><br><br>

<input type="submit" name="add_course" value="Add Course">

</form>

<hr>

<h2>Course List</h2>

<table border="1" cellpadding="8">

<tr>
<th>ID</th>
<th>Title</th>
<th>Duration</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

$result = mysqli_query($conn, "SELECT * FROM courses");

while ($row = mysqli_fetch_assoc($result)) {

echo "<tr>";

echo "<td>".$row['id']."</td>";
echo "<td>".$row['title']."</td>";
echo "<td>".$row['duration']."</td>";
echo "<td>".$row['status']."</td>";

echo "<td>
<a href='?delete_course=".$row['id']."'>Delete</a>
</td>";

echo "</tr>";
}

?>

</table>

<hr>

<h2>Add Student</h2>

<form method="post">

Name:
<input type="text" name="name" required><br><br>

Course:
<select name="course_id" required>

<option value="">Select Course</option>

<?php

$result = mysqli_query($conn, "SELECT * FROM courses");

while ($row = mysqli_fetch_assoc($result)) {

echo "<option value='".$row['id']."'>"
    .$row['title'].
    "</option>";

}

?>

</select><br><br>

Fee:
<input type="number" name="fee"><br><br>

Roll No:
<input type="text" name="rollno" required><br><br>

Phone:
<input type="text" name="phone"><br><br>

Address:
<input type="text" name="address"><br><br>

DOB:
<input type="date" name="dob"><br><br>

Status:
<select name="student_status">
    <option value="Active">Active</option>
    <option value="Inactive">Inactive</option>
</select><br><br>

<input type="submit" name="add_student"
value="Add Student">

</form>

<hr>

<h2>Student List</h2>

<table border="1" cellpadding="8">

<tr>
<th>ID</th>
<th>Name</th>
<th>Course ID</th>
<th>Fee</th>
<th>Roll No</th>
<th>Phone</th>
<th>Address</th>
<th>DOB</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

$result = mysqli_query($conn, "SELECT * FROM students");

while ($row = mysqli_fetch_assoc($result)) {

echo "<tr>";

echo "<td>".$row['id']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['course_id']."</td>";
echo "<td>".$row['fee']."</td>";
echo "<td>".$row['rollno']."</td>";
echo "<td>".$row['phone']."</td>";
echo "<td>".$row['address']."</td>";
echo "<td>".$row['dob']."</td>";
echo "<td>".$row['status']."</td>";

echo "<td>
<a href='?delete_student=".$row['id']."'>Delete</a>
</td>";

echo "</tr>";
}

?>

</table>

</body>
</html>