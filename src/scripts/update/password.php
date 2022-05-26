<?php
session_start();

if (isset($_SESSION['name']) && $_SESSION['login'] === true) {

    if ($_POST['changepass']) {

        $password_file = "../../password.txt";

        $confirm_password = $_POST['confirm_password'];
        $new_password = $_POST['new_password'];
        $new_password_hash = password_hash($new_password, PASSWORD_BCRYPT);

        $current_password = file_get_contents($password_file, true);

        if (password_verify($confirm_password, $current_password)) {
            $fp = fopen($password_file, 'w+');
            fwrite($fp, $new_password_hash);
            fclose($fp);

            header("Location: ../../settings.php?success-passchange");
        } else {
            header("Location: ../../settings.php?error-passchange");
        }
    }
} else {
    header('Location: ../../index.php');
}
