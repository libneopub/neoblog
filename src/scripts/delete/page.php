<?php
session_start();

if (isset($_SESSION['name']) && $_SESSION['login'] === true) {

    if (isset($_GET['id'])) {

        // Get data from editor
        $id = $_GET['id'];

        // Get older blogs
        $contents = file_get_contents("../../content/pages.json");
        $oldpages = json_decode($contents);

        // Create new array
        $newpages = array();
        $title = "";

        foreach ($oldpages as $page) {
            if ($page->id === $id) {
                // do nothing, so it won't go into the new file
                $title == $page->title;
            } else {
                array_push($newpages, $page);
            }
        }

        unlink("../../p/" . $id . ".php");

        $fp = fopen("../../content/pages.json", 'w+');
        fwrite($fp, json_encode($newpages));
        fclose($fp);

        header('Location: ../../pages.php?success-deleted');
    }
} else {
    header('Location: ../../index.php');
}
