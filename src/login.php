<?php

// Load the password
$password = file_get_contents("./password.txt", true);
session_start();

if (isset($_POST['login'])) {
    $entered_password = $_POST['password'];

    if ($_POST['name'] != "" && password_verify($entered_password, $password)) {
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
        $_SESSION['login'] = true;

        header("Location: index.php");
    } else {
        header("Location: index.php?wrongpass");
    }
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();

    header("Location: index.php");
}
