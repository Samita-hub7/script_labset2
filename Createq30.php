<?php

$conn = mysqli_connect("localhost", "root", "", "php_lab");

if (!$conn) {
    die("Database connection failed");
}

/* =========================
   SAVE RECORD
========================= */

if (isset($_POST['save'])) {

    $name = $_POST['name'];
    $rank = $_POST['rank'];
    $status = $_POST['status'];
    $created_by = $_POST['created_by'];

    $image = "";

    if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {

        $image = $_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "uploads/" . $image
        );
    }

    if (empty($name) || empty($rank) || empty($status)) {

        $message = "Please fill all required fields.";

    } else {

        $sql = "INSERT INTO records
                (name, rank, status, image, created_by)
                VALUES
                ('$name', '$rank', '$status', '$image', '$created_by')";

        if (mysqli_query($conn, $sql)) {
            $message = "Record saved successfully.";
        }
    }
}


/* =========================
   DELETE RECORD
========================= */

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    mysqli_query(
        $conn,
        "DELETE FROM records WHERE id=$id"
    );

    header("Location: q30.php");
    exit();
}


/* =========================
   GET RECORD FOR EDIT
========================= */

$editData = null;

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];

    $result = mysqli_query(
        $conn,
        "SELECT * FROM records WHERE id=$id"
    );

    $editData = mysqli_fetch_assoc($result);
}


/* =========================
   UPDATE RECORD
========================= */

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $rank = $_POST['rank'];
    $status = $_POST['status'];
    $updated_by = $_POST['updated_by'];

    $sql = "UPDATE records SET
            name='$name',
            rank='$rank',
            status='$status',
            updated_by='$updated_by'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {

        header("Location: q30.php");
        exit();
    }
}

?>

<!DOCTYPE html>

<html>

<head>

<title>PHP CRUD</title>

<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
}

.container {
    width: 90%;
    margin: 20px auto;
    background: white;
    padding: 30px;
    box-shadow: 0 0 10px gray;
}

h1, h2 {
    text-align: center;
}

label {
    display: block;
    margin-top: 15px;
    font-size: 18px;
}

input, select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    box-sizing: border-box;
    font-size: 15px;
}

input[type="file"] {
    width: auto;
}

button {
    width: 100%;
    padding: 12px;
    margin-top: 20px;
    background-color: green;
    color: white;
    border: none;
    font-size: 16px;
    cursor: pointer;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 25px;
}

th {
    background-color: #ddd;
}

th, td {
    border: 1px solid black;
    padding: 10px;
    text-align: center;
}

img {
    width: 80px;
    height: 80px;
    object-fit: cover;
}

.edit {
    color: blue;
    text-decoration: none;
}

.delete {
    color: red;
    text-decoration: none;
}

.message {
    text-align: center;
    color: green;
    font-weight: bold;
}

</style>

</head>

<body>

<div class="container">

<h1>
<?php
if ($editData) {
    echo "Update Record";
} else {
    echo "Add New Record";
}
?>
</h1>


<?php

if (isset($message)) {
    echo "<p class='message'>$message</p>";
}

?>


<!-- ================= FORM ================= -->

<form method="post" enctype="multipart/form-data">

<?php

if ($editData) {

    echo "<input type='hidden'
          name='id'
          value='".$editData['id']."'>";

}

?>


<label>Name:</label>

<input type="text"
       name="name"
       placeholder="Enter name"
       value="<?php
       if ($editData) echo $editData['name'];
       ?>"
       required>


<label>Rank:</label>

<input type="text"
       name="rank"
       placeholder="Enter rank"
       value="<?php
       if ($editData) echo $editData['rank'];
       ?>"
       required>


<label>Status:</label>

<select name="status" required>

<option value="">Select Status</option>

<option value="Active"
<?php
if ($editData && $editData['status']=="Active")
echo "selected";
?>
>
Active
</option>

<option value="Inactive"
<?php
if ($editData && $editData['status']=="Inactive")
echo "selected";
?>
>
Inactive
</option>

</select>


<?php

if (!$editData) {

?>

<label>Image:</label>

<input type="file" name="image">

<?php

}

?>


<?php

if ($editData) {

?>

<label>Updated By:</label>

<input type="text"
       name="updated_by"
       placeholder="Enter your name"
       required>

<button type="submit" name="update">
Update Record
</button>

<?php

} else {

?>

<label>Created By:</label>

<input type="text"
       name="created_by"
       placeholder="Enter your name">

<button type="submit" name="save">
Save Record
</button>

<?php

}

?>

</form>


<!-- ================= RECORD LIST ================= -->

<h1>All Records</h1>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Rank</th>
<th>Status</th>
<th>Image</th>
<th>Created By</th>
<th>Updated By</th>
<th>Created At</th>
<th>Updated At</th>
<th>Action</th>

</tr>


<?php

$result = mysqli_query(
    $conn,
    "SELECT * FROM records ORDER BY id ASC"
);

while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

<td>
<?php echo $row['id']; ?>
</td>

<td>
<?php echo $row['name']; ?>
</td>

<td>
<?php echo $row['rank']; ?>
</td>

<td>
<?php echo $row['status']; ?>
</td>

<td>

<?php

if (!empty($row['image'])) {

?>

<img src="uploads/<?php echo $row['image']; ?>">

<?php

} else {

echo "No Image";

}

?>

</td>

<td>
<?php echo $row['created_by']; ?>
</td>

<td>
<?php echo $row['updated_by']; ?>
</td>

<td>
<?php echo $row['created_at']; ?>
</td>

<td>
<?php echo $row['updated_at']; ?>
</td>

<td>

<a class="edit"
href="q30.php?edit=<?php echo $row['id']; ?>">
Edit
</a>

|

<a class="delete"
href="q30.php?delete=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this record?')">
Delete
</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>

</html>