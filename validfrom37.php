<?php

$name = "";
$address = "";
$username = "";
$email = "";
$website = "";
$phone = "";
$gender = "";
$course = "";

$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $name = trim($_POST["name"] ?? "");
    $address = trim($_POST["address"] ?? "");
    $username = trim($_POST["username"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $website = trim($_POST["website"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $gender = $_POST["gender"] ?? "";
    $course = $_POST["course"] ?? "";

    // Name validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (!preg_match("/^[A-Za-z ]+$/", $name)) {
        $errors[] = "Name must contain only letters and spaces.";
    }

    // Address validation
    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    // Username validation
    if (empty($username)) {
        $errors[] = "Username is required.";
    } elseif (!preg_match("/^[A-Za-z0-9_]+$/", $username)) {
        $errors[] = "Username can contain only letters, numbers and underscore.";
    }

    // Email validation
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Password validation
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (!preg_match(
        "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{8,}$/",
        $password
    )) {
        $errors[] = "Password must contain at least 8 characters, one uppercase letter, one lowercase letter, one digit and one special character.";
    }

    // Website validation
    if (empty($website)) {
        $errors[] = "Website is required.";
    } elseif (!filter_var($website, FILTER_VALIDATE_URL)) {
        $errors[] = "Invalid website URL.";
    }

    // Phone validation
    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match("/^(96|97|98)[0-9]{8}$/", $phone)) {
        $errors[] = "Phone must contain 10 digits and start with 96, 97 or 98.";
    }

    // Gender validation
    if (empty($gender)) {
        $errors[] = "Please select a gender.";
    } elseif (!in_array($gender, ["Male", "Female"])) {
        $errors[] = "Invalid gender selected.";
    }

    // Course validation
    $validCourses = ["BCA", "BIM", "BBA", "CSIT"];

    if (empty($course)) {
        $errors[] = "Please select a course.";
    } elseif (!in_array($course, $validCourses)) {
        $errors[] = "Invalid course selected.";
    }

    // If there are no errors
    if (empty($errors)) {
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registration Form</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 30px;
        }

        .container {
            width: 500px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px gray;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
            vertical-align: top;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 300px;
            padding: 8px;
            border: 1px solid #aaa;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-left: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .errors {
            background-color: #ffe6e6;
            color: red;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .errors p {
            margin: 5px 0;
        }

        .success {
            background-color: #e6ffe6;
            color: green;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }

    </style>

</head>

<body>

<div class="container">

    <h2>Registration Form</h2>

    <form method="post" action="">

        <div class="form-group">
            <label>Name:</label>

            <input type="text"
                   name="name"
                   value="<?php echo htmlspecialchars($name); ?>">
        </div>

        <div class="form-group">
            <label>Address:</label>

            <input type="text"
                   name="address"
                   value="<?php echo htmlspecialchars($address); ?>">
        </div>

        <div class="form-group">
            <label>Username:</label>

            <input type="text"
                   name="username"
                   value="<?php echo htmlspecialchars($username); ?>">
        </div>

        <div class="form-group">
            <label>Email:</label>

            <input type="text"
                   name="email"
                   value="<?php echo htmlspecialchars($email); ?>">
        </div>

        <div class="form-group">
            <label>Password:</label>

            <input type="password"
                   name="password">
        </div>

        <div class="form-group">
            <label>Website:</label>

            <input type="text"
                   name="website"
                   placeholder="http://www.tuedu.np"
                   value="<?php echo htmlspecialchars($website); ?>">
        </div>

        <div class="form-group">
            <label>Phone:</label>

            <input type="text"
                   name="phone"
                   value="<?php echo htmlspecialchars($phone); ?>">
        </div>

        <div class="form-group">

            <label>Gender:</label>

            <input type="radio"
                   name="gender"
                   value="Male"
                   <?php if ($gender == "Male") echo "checked"; ?>>
            Male

            <input type="radio"
                   name="gender"
                   value="Female"
                   <?php if ($gender == "Female") echo "checked"; ?>>
            Female

        </div>

        <div class="form-group">

            <label>Course:</label>

            <select name="course">

                <option value="">Select Course</option>

                <option value="BCA"
                    <?php if ($course == "BCA") echo "selected"; ?>>
                    BCA
                </option>

                <option value="BIM"
                    <?php if ($course == "BIM") echo "selected"; ?>>
                    BIM
                </option>

                <option value="BBA"
                    <?php if ($course == "BBA") echo "selected"; ?>>
                    BBA
                </option>

                <option value="CSIT"
                    <?php if ($course == "CSIT") echo "selected"; ?>>
                    CSIT
                </option>

            </select>

        </div>

        <input type="submit" value="Submit">

    </form>


    <!-- Display Errors -->

    <?php if (!empty($errors)) { ?>

        <div class="errors">

            <h3>Validation Errors:</h3>

            <?php foreach ($errors as $error) { ?>

                <p>
                    • <?php echo htmlspecialchars($error); ?>
                </p>

            <?php } ?>

        </div>

    <?php } ?>


    <!-- Display Success Message -->

    <?php if ($success) { ?>

        <div class="success">
            Form Submitted Successfully!
        </div>

    <?php } ?>

</div>

</body>

</html>
