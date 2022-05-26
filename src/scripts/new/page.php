<?php
session_start();

if (isset($_SESSION['name']) && $_SESSION['login'] === true) {
    // Get data from editor
    $title = $_POST['title'];
    $text = $_POST['text'];
    $id = uniqid();

    // Create an array
    $page = array("id" => $id, "title" => $title, "text" => $text, "link" => "/p/" . $id . ".php");

    // Get the older pages
    $oldercontent = file_get_contents("../../content/pages.json");
    $pages = json_decode($oldercontent);

    // Merge old and new pages
    array_unshift($pages, $page);

    // Put updated array in the pages file
    $fp = fopen("../../content/pages.json", 'w+');
    fwrite($fp, json_encode($pages));
    fclose($fp);

    // Get page template
    $template = file_get_contents("../../p/template.php");

    // Create page file
    $fp = fopen("../../p/" . $id . ".php", 'a');
    fwrite($fp, $template);
    fclose($fp);

    header("Location: ../../pages.php?success-post");
} else {
    header('Location: ../../index.php');
}
