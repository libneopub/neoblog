<?php
session_start();

if (isset($_SESSION['name']) && $_SESSION['login'] === true) {
    // Get data from editor
    $text = $_POST['posttext-edit'];
    $id = $_POST['id'];
    $datum = date("l, j F Y");
    $auteur = $_SESSION['name'];

    // Get older blogs
    $contents = file_get_contents("../../content/blog.json");
    $oldblogs = json_decode($contents);

    // Create new array
    $newblogs = array();

    // Overwrite array with new post
    foreach ($oldblogs as $blog) {
        if ($blog->id === $id) {
            $title = $blog->title;
            $tags = $blog->tags;
            $taglink = $blog->taglink;
            $link = $blog->link;
            $Nid = $blog->id;
            $newblog = array("id" => $Nid, "title" => $title, "text" => $text, "auteur" => $auteur, "datum" => $datum, "tags" => $tags, "taglink" => $taglink, "link" => $link);
            array_push($newblogs, $newblog);
        } else {
            array_push($newblogs, $blog);
        }
    }

    // Put updated data in blogposts file
    $fp = fopen("../../content/blog.json", 'w+');
    fwrite($fp, json_encode($newblogs));
    fclose($fp);

    header('Location: ../../blogs.php?success-update');
} else {
    header('Location: ../../index.php');
}
