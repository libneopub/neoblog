<?php
session_start();

if (isset($_SESSION['name']) && $_SESSION['login'] === true) {
    if (isset($_POST['css'])) {
        $fp = fopen("../../../assets/main.css", 'w+');
        fwrite($fp, $_POST['css']);
        fclose($fp);

        header('Location: ../../settings.php?success-css');
    }
} else {
    header('Location: ../../index.php');
}
