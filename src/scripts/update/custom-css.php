<?php
// Script to edit main css file.

require "../../functions/auth.php";

redirectIfNotLoggedIn();

if (isset($_POST['css'])) {
    $fp = fopen("../../../assets/main.css", 'w+');
    fwrite($fp, $_POST['css']);
    fclose($fp);

    header('Location: ../../settings.php?success-css');
}
