<!DOCTYPE html>
<html>
<body>

<h2>Login Form</h2>

<form method="post">
    Username:
    <input type="text" name="username"><br><br>

    Password:
    <input type="password" name="password"><br><br>

    <input type="submit" name="login" value="Login">
</form>

<?php
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
    } elseif ($username == "admin" && $password == "12345") {
        echo "Login successful.";
    } else {
        echo "Invalid username or password.";
    }
}
?>

</body>
</html>