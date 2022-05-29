<?php
// Script to hide quickstart box.

require "../functions/auth.php";

redirectIfNotLoggedIn();

$fp = fopen("../quickstart.txt", 'w+');
fwrite($fp, "closed");
fclose($fp);

header("Location: ../index.php");
