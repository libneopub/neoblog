<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "components/module-head.php";
    ?>

    <?php $pagename = basename(__FILE__); ?>
</head>

<body>
    <?php include "components/login-window.php"; ?>

    <?php if ($_SESSION['login'] === true) { ?>
        <?php include "components/sidebar.php"; ?>

        <div class="w3-main themes module-content">

            <?php include "components/module-header.php" ?>

            <div class="w3-container">
                <p>
                    To activate a new theme, click one of the themes below or upload your own theme in the CSS editor, which can be found in <a href="settings.php#custom-css">settings</a>.
                </p>
            </div>

            <div class="themes"></div>
        </div>

        <script src="components/sidebar.js"></script>
        <script src="components/themes.js"></script>
    <?php } ?>
</body>

</html>