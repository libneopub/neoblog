<?php
session_start();

if (isset($_SESSION['name']) && $_SESSION['login'] === true) {

    if (isset($_GET['id'])) {

        // Get data from editor
        $id = $_GET['id'];

        // Get older blogs
        $contents = file_get_contents("../../content/blog.json");
        $oldblogs = json_decode($contents);

        // Create new array
        $newblogs = array();
        $title = "";

        // Overwrite array with new post
        foreach ($oldblogs as $blog) {
            if ($blog->id === $id) {
                // do nothing, so it won't go into the new file
                $title == $blog->title;
            } else {
                array_push($newblogs, $blog);
            }
        }

        unlink("../../post/" . $id . ".php");

        // Put updated data in blogposts file
        $fp = fopen("../../content/blog.json", 'w+');
        fwrite($fp, json_encode($newblogs));
        fclose($fp);

        header('Location: ../../blogs.php?success-deleted');
    }
} else {
    header('Location: ../../index.php');
}
