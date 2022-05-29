<?php
// Script to install a new theme.

require "../../vendor/autoload.php";
require "../../../utils.php";
require "../../functions/auth.php";

redirectIfNotLoggedIn();

$theme_path = "../../../assets/main.css";

$theme_url = $_GET['url'];
echo $theme_url;

$theme_content = getFileFromURL($theme_url);
writeContentToFile($theme_path, $theme_content);

header("Location: ../../../index.php");

function getFileFromURL($url)
{
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

function writeContentToFile($file_path, $content)
{
    $file = fopen($file_path, 'w+');
    fwrite($file, $content);
    fclose($file);
}
