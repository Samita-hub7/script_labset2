<!DOCTYPE html>
<html>
<head>
    <title>Send Email Notification</title>
</head>

<body>

<h1>Send Email Notification</h1>

<form method="post">

    <label>Enter Email Address:</label>

    <input type="email"
           name="email"
           placeholder="Enter email address"
           required>

    <button type="submit" name="send">
        Send Email
    </button>

</form>

<?php

if (isset($_POST['send'])) {

    $email = $_POST['email'];

    $subject = "Email Notification";

    $message = "This is a notification email.";

    $headers = "From: admin@example.com";

    if (mail($email, $subject, $message, $headers)) {

        echo "<p>Email sent successfully.</p>";

    } else {

        echo "<p>Unable to send email.</p>";

    }
}

?>

</body>
</html>