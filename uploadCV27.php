<!DOCTYPE html>
<html>
<body>

<h2>Upload CV</h2>

<form method="post" enctype="multipart/form-data">

    Select CV:
    <input type="file" name="cv"><br><br>

    <input type="submit" name="upload" value="Upload CV">

</form>

<?php

if (isset($_POST['upload'])) {

    $file = $_FILES['cv'];

    $fileName = $file['name'];
    $fileSize = $file['size'];
    $fileTmp = $file['tmp_name'];

    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowed = ['pdf', 'doc', 'docx'];

    if (!in_array($extension, $allowed)) {
        echo "Only PDF, DOC and DOCX files are allowed.";
    } elseif ($fileSize >= 1024 * 1024) {
        echo "File size must be less than 1 MB.";
    } else {

        if (!is_dir("uploads")) {
            mkdir("uploads");
        }

        move_uploaded_file($fileTmp, "uploads/" . $fileName);

        echo "CV uploaded successfully.";
    }
}

?>

</body>
</html>