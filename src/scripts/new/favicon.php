<?php
// Script to upload a favicon

require "../../functions/auth.php";

redirectIfNotLoggedIn();

$new_file_name = "favicon.ico";
$tmp_file_path = $_FILES["upload"]["tmp_name"];
$target_dir = "../../../assets/icons/";
$target_file = $target_dir . $new_file_name;

checkIfFileIsImageAndRedirectIfNot($tmp_file_path);
deleteFileIsItExists($target_file);

if (move_uploaded_file($tmp_file_path, $target_file)) {
    header("Location: ../../settings.php?success-ico-upload");
} else {
    header("Location: ../../settings.php?error-ico-upload");
}

function deleteFileIsItExists($file)
{
    if (file_exists($file)) {
        unlink($file);
    }
}

function checkIfFileIsImageAndRedirectIfNot($file)
{
    $check = getimagesize($file);
    $mime = $check["mime"];

    if ($check === false || ($mime !== "image/x-icon" && $mime !== "image/vnd.microsoft.icon")) {
        header("Location: ../../settings.php?error-ico-upload");
        exit;
    }
}
