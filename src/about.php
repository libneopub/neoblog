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

        <div class="w3-main module-content">

            <?php include "components/module-header.php" ?>

            <div class="w3-container">
                <p>
                    Neoblog is the succesor to SkyLight. It is an open-source blogging system designed with the IndieWeb in mind. It builts upon the strong foundation of neopub, my microblogging platform. It acts as a simple GUI for posting content.
                </p>
                <?php
                $neoblog_version = file_get_contents('version.txt', true);
                $neopub_version = file_get_contents('../version.txt', true);
                ?>
                <p>
                    <strong>Version:</strong> <?= $neoblog_version ?><br>
                    <strong>SkyLight backend:</strong> v0.04.1-preview<br>
                    <strong>Neopub version:</strong> <?= $neopub_version ?><br>
                </p>
            </div>
        </div>

        <script src="components/sidebar.js"></script>

    <?php } ?>
</body>

</html>