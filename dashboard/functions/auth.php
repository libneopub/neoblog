<?php
// Function to check is user is logged in and 
// redirect to the login window if not.

session_start();

if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
}

function isLoggedIn()
{
    return $_SESSION['login'] === true;
}

function redirectIfNotLoggedIn()
{
    if (!isLoggedIn()) {
        $login_window_url = __DIR__ . "../index.php";
        header("Location: $login_window_url");

        exit;
    }
}
