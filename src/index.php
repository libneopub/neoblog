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
                        <div class="w3-left"><i class="fa fa-clone w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3><?php include "analytics/pages.php"; ?></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Pages</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-deep-orange w3-padding-16 w3-card dashboard-section">
                        <div class="w3-left"><i class="fas fa-comments w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3><?php include "analytics/comments.php"; ?></h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Comments</h4>
                    </div>
                </div>
            </div>

            <hr>

            <?php include "components/quickstart.php"; ?>

            <div class="w3-container">
                <h2>Welcome</h2>
                <p>
                    Welcome to your new website! This is neoblog, a simple plugin for neopub that provides a minimal and responsive portal for managing your website.
                </p>
            </div>
            <hr>
        </div>

        <script src="components/sidebar.js"></script>
        <script src="components/quickstart.js"></script>

    <?php } ?>
</body>

</html>