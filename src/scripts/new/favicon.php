<?php
session_start();

if (isset($_SESSION['name']) && $_SESSION['login'] === true) {

    $new_file_name = "favicon.ico";

    $target_dir = "../../../";
    $target_file = $target_dir . $new_file_name;

    $upload_failed = false;

    if (isset($_FILES["upload"])) {

        $check = getimagesize($_FILES["upload"]["tmp_name"]);

        if ($check === false) {
            $error == "<br>Error: the uploaded file wasn't a image.<br>";
            $upload_failed = true;
        }
    }

    if ($check["mime"] !== "image/x-icon" && $check["mime"] !== "image/vnd.microsoft.icon") {
        $error == "<br>Error: the image file you selected wasn't a valid favicon file.<br>";
        $upload_failed = true;
    }

    // Check if file already exists, remove it
    if (file_exists($target_file)) {
        unlink($target_file);
    }

    if ($upload_failed == true) {
        header("Location: ../../settings.php?error-ico-upload");
    } else {
        if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
            header("Location: ../../settings.php?success-ico-upload");
        } else {
            header("Location: ../../settings.php?error-ico-upload");
        }
    }
} else {
    header('Location: ../../index.php');
}
