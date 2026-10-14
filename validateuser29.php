<!DOCTYPE html>
<html>
<body>

<h2>User Registration</h2>

<form method="post">

    Username:
    <input type="text" name="username"><br><br>

    Email:
    <input type="text" name="email"><br><br>

    Date of Birth:
    <input type="date" name="dob"><br><br>

    Phone:
    <input type="text" name="phone"><br><br>

    <input type="submit" name="register" value="Register">

</form>

<?php

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];

    if (strlen($username) < 8) {
        echo "Username must contain at least 8 characters.";
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
    }

    elseif (empty($dob) || strtotime($dob) === false) {
        echo "Invalid date of birth.";
    }

    elseif (strlen($phone) != 10 || !is_numeric($phone)) {
        echo "Phone number must contain 10 digits.";
    }

    else {
        echo "Registration successful.";
    }
}

?>

</body>
</html>