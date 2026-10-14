<!DOCTYPE html>
<html>
<head>

<title>PHP File Handling Operations</title>

<style>

body {
    font-family: "Times New Roman", serif;
    padding: 15px;
}

h1 {
    font-size: 48px;
    margin-top: 0;
}

label {
    font-size: 32px;
}

input, select {
    font-size: 27px;
    padding: 8px;
    margin-left: 5px;
}

textarea {
    font-size: 25px;
    width: 680px;
    height: 180px;
    padding: 8px;
}

button {
    font-size: 27px;
    padding: 8px 15px;
    margin-top: 15px;
}

.result {
    font-size: 27px;
    margin-top: 20px;
}

</style>

</head>

<body>

<h1>PHP File Handling Operations</h1>

<form method="post">

    <label>Enter Filename:</label>
    <input type="text"
           name="filename"
           placeholder="example.txt"
           required>

    <br><br><br>

    <label>Select Operation:</label>

    <select name="operation">

        <option value="check">Check File</option>
        <option value="open">Open File</option>
        <option value="write">Write File</option>
        <option value="read">Read File</option>
        <option value="close">Close File</option>
        <option value="rename">Rename File</option>
        <option value="permission">Check Permissions</option>
        <option value="chmod">Change Permissions</option>

    </select>

    <br><br><br>

    <label>Text to Write:</label>

    <br>

    <textarea name="text"
              placeholder="Enter text here"></textarea>

    <br><br>

    <label>New Filename:</label>

    <input type="text"
           name="newfilename"
           placeholder="newfile.txt">

    <br><br>

    <button type="submit" name="perform">
        Perform Operation
    </button>

</form>


<?php

if (isset($_POST['perform'])) {

    $filename = $_POST['filename'];
    $operation = $_POST['operation'];
    $text = $_POST['text'];
    $newfilename = $_POST['newfilename'];

    echo "<div class='result'>";

    /* 1. CHECK FILE */

    if ($operation == "check") {

        if (file_exists($filename)) {

            echo "File exists.";

        } else {

            echo "File does not exist.";

        }
    }


    /* 2. OPEN FILE */

    elseif ($operation == "open") {

        $file = fopen($filename, "r");

        if ($file) {

            echo "File opened successfully.";

            fclose($file);

        } else {

            echo "Unable to open file.";

        }
    }


    /* 3. WRITE FILE */

    elseif ($operation == "write") {

        $file = fopen($filename, "w");

        fwrite($file, $text);

        fclose($file);

        echo "Data written successfully to $filename.";

    }


    /* 4. READ FILE */

    elseif ($operation == "read") {

        if (file_exists($filename)) {

            $file = fopen($filename, "r");

            $content = fread($file, filesize($filename));

            fclose($file);

            echo "File Content:<br><br>";
            echo nl2br($content);

        } else {

            echo "File does not exist.";

        }
    }


    /* 5. CLOSE FILE */

    elseif ($operation == "close") {

        $file = fopen($filename, "r");

        if ($file) {

            fclose($file);

            echo "File closed successfully.";

        } else {

            echo "Unable to open file.";

        }
    }


    /* 6. RENAME FILE */

    elseif ($operation == "rename") {

        if (file_exists($filename)) {

            if (rename($filename, $newfilename)) {

                echo "File renamed successfully.";

            } else {

                echo "Unable to rename file.";

            }

        } else {

            echo "File does not exist.";

        }
    }


    /* 7. CHECK PERMISSIONS */

    elseif ($operation == "permission") {

        if (file_exists($filename)) {

            $permission = fileperms($filename);

            echo "File Permissions: ";

            echo substr(
                sprintf("%o", $permission),
                -4
            );

        } else {

            echo "File does not exist.";

        }
    }


    /* 8. CHANGE PERMISSIONS */

    elseif ($operation == "chmod") {

        if (file_exists($filename)) {

            chmod($filename, 0644);

            echo "File permissions changed successfully.<br>";

            echo "Updated Permission: 0644";

        } else {

            echo "File does not exist.";

        }
    }

    echo "</div>";
}

?>

</body>
</html>