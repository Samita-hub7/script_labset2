<?php
session_start();

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "12345") {

        $_SESSION['username'] = $username;

        setcookie("username", $username, time() + 3600);

        echo "Login successful.";
    } else {
        echo "Invalid username or password.";
    }
}
?>

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
if (isset($_SESSION['username'])) {
    echo "<p>Session Username: " . $_SESSION['username'] . "</p>";
}

if (isset($_COOKIE['username'])) {
    echo "<p>Cookie Username: " . $_COOKIE['username'] . "</p>";
}
?>

</body>
</html>