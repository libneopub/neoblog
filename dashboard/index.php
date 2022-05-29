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

            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-quarter">
                    <div class="w3-container w3-red w3-padding-16 w3-card dashboard-section">
                        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3><?php include "analytics/views.php"; ?></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Views</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-blue w3-padding-16 w3-card dashboard-section">
                        <div class="w3-left"><i class="fa fa-edit w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3><?php include "analytics/posts.php"; ?></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Blogposts</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-green w3-padding-16 w3-card dashboard-section">
                        <div class="w3-left"><i class="fas fa-comments w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3><?php include "analytics/comments.php"; ?></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Webmentions</h4>
                    </div>
                </div>
            </div>

            <hr>

            <?php include "components/quickstart.php"; ?>

            <div class="w3-container">
                <h3>Welcome</h3>
                <p>
                    Neoblog, a simple plugin for neopub that provides a minimal and responsive portal for managing your website.
                </p>
                <p>
                    Neoblog is the succesor to <a href="https://github.com/RobinBoers/SkyLight-Website-Editor">SkyLight</a>. It is an open-source blogging system designed with the IndieWeb in mind. It builts upon the strong foundation of <a href="https://github.com/RobinBoers/neopub">neopub</a>, my microblogging platform. It acts as a simple GUI for posting content.
                </p>
                <p>
                    <img src="https://img.shields.io/github/v/release/RobinBoers/neoblog?include_prereleases" alt="Latest release">
                    <img src="https://img.shields.io/github/repo-size/RobinBoers/neoblog?label=size" alt="Small file size">
                    <img src="https://img.shields.io/github/license/RobinBoers/neoblog" alt="License">
                </p>
            </div>
            <hr>
        </div>

        <script src="components/sidebar.js"></script>
        <script src="components/quickstart.js"></script>

    <?php } ?>
</body>

</html>