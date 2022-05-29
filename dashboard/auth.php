<?php
session_start();
require "../config.php";

$callback_uri = "$site_url/src/auth.php";

if (beginAuthentication()) {
    $state = uniqid();
    $_SESSION["state"] = $state;

    $url = "https://indieauth.com/auth?me=$site_domain&client_id=$site_url/&redirect_uri=$callback_uri&state=$state";

    header("Location: $url");
}

if (isAuthenticating()) {
    if($_SESSION['state'] === $_GET['state'] && $_GET['me'] === "$site_domain/") {
        $code = $_GET['code'];        

        $url = "https://indieauth.com/auth";
        $params = "code=$code&client_id=$site_url/&redirect_uri=$callback_uri";
        $headers = array(
            'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
            'Accept: application/json'
        );

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        
        $resp = curl_exec($curl);
        curl_close($curl);

        $parsed_resp = json_decode($resp);
        
        if ($parsed_resp->me === "$site_domain/") {
            $_SESSION['login'] = true;
            $_SESSION['me'] = "$site_domain/";
            $_SESSION['name'] = $site_author;

            header("Location: index.php");
        } else {
            header("Location: index.php?auth-failed");
        }
    }
}

if (isLoggingOut()) {
    session_unset();
    session_destroy();

    header("Location: index.php");
}

// Check request types

function beginAuthentication() {
    return isset($_GET['start']);
}

function isAuthenticating() {
    return isset($_GET['code']) && isset($_GET['state']) && isset($_GET['me']);
}

function isLoggingOut() {
    return isset($_GET['logout']);
}