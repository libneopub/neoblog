<?php
session_start();

if (isset($_SESSION['name']) && $_SESSION['login'] === true) {
    // Get data from editor
    $text = $_POST['pagetext-edit'];
    $id = $_POST['id'];

    // Get older blogs
    $contents = file_get_contents("../../content/pages.json");
    $oldpages = json_decode($contents);

    // Create new array
    $newpages = array();

    // Overwrite array with new post
    foreach ($oldpages as $page) {
        if ($page->id === $id) {
            $title = $page->title;
            $link = $page->link;
            $Nid = $page->id;
            $newpage = array("id" => $Nid, "title" => $title, "text" => $text, "link" => $link);
            array_push($newpages, $newpage);
        } else {
            array_push($newpages, $page);
        }
    }

    // Put updated data in blogposts file
    $fp = fopen("../../content/pages.json", 'w+');
    fwrite($fp, json_encode($newpages));
    fclose($fp);

    header('Location: ../../pages.php?success-update');
} else {
    header('Location: ../../index.php');
}
