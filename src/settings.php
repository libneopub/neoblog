<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "components/module-head.php";
    require "../config.php";
    ?>

    <?php $pagename = basename(__FILE__); ?>
</head>

<body>
    <?php include "components/login-window.php"; ?>

    <?php if ($_SESSION['login'] === true) { ?>
        <?php include "components/sidebar.php"; ?>

        <div class="w3-main module-content">

            <?php include "components/module-header.php" ?>

            <!-- Popup if password change was successfull -->
            <?php if (isset($_GET['success-passchange'])) {
                echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Password changed successfully.</b></p>';
            } ?>

            <!-- Popup if user enterd wrong password (password change) -->
            <?php if (isset($_GET['error-passchange'])) {
                echo '<p class="w3-container w3-left w3-text-red"> <b><i class="fa fa-times"></i> Wrong password</b></p>';
            } ?>

            <!-- Popup if site information was changed successfull -->
            <?php if (isset($_GET['success-siteinfo'])) {
                echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Site information updated successfully.</b></p>';
            } ?>

            <!-- Popup if custom css was successfull -->
            <?php if (isset($_GET['success-css'])) {
                echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Custom CSS Styling successfully updated.</b></p>';
            } ?>

            <!-- Popup if favicon upload was successfull -->
            <?php if (isset($_GET['success-ico-upload'])) {
                echo '<p class="w3-container w3-left w3-text-green"> <b><i class="fa fa-check"></i> Favicon successfully uploaded.</b></p>';
            } ?>

            <!-- Popup if favicon upload was successfull -->
            <?php if (isset($_GET['error-ico-upload'])) {
                echo '<p class="w3-container w3-left w3-text-red"> <b><i class="fa fa-times"></i> Favicon upload failed.</b></p>';
            } ?>

            <hr>

            <div class="w3-container settings">

                <h5 id="general"><b><i class="fas fa-users-cog"></i> General</b></h5>

                <form action="scripts/update/config.php" method="post">
                    <label for="title">Site title</label>
                    <input name="title" type="text" autocomplete="off" value="<?= $site_title ?>">

                    <label for="description">Description</label>
                    <textarea name="description" autocomplete="off"><?= $site_description ?></textarea>

                    <label for="lang">Site language</label>
                    <select id="langlist" name="language"></select>

                    <label for="author">Author</label>
                    <input name="author" type="text" autocomplete="off" value="<?= $site_author ?>">

                    <label for="domain">Domain name</label>
                    <input name="domain" type="text" autocomplete="off" value="<?= $site_domain ?>">

                    <label for="profile_picture">Profile image URL</label>
                    <input name="profile_picture" type="text" autocomplete="off" value="<?= $site_author_profile_picture ?>">

                    <br><br>

                    <input name="enter" type="submit" value="Save">
                </form>

                <hr>

                <h5 id="logo"><b><i class="fa fa-image"></i> Logo & Favicon</b></h5>

                <form class="inline-form" action="scripts/update/favicon.php" method="post" enctype="multipart/form-data" id="ico-form">
                    <input style="display:none" accept="image/x-icon image/vnd.microsoft.icon" required type="file" name="upload" id="ico-upload">

                    <input type="button" onclick="uploadFavicon()" value="Upload favicon">
                </form>

                <hr>

                <h5 id="custom-css"><b><i class="fa fa-paint-brush"></i> Custom CSS Styling</b></h5>

                <form action="scripts/update/custom-css.php" method="post" enctype="multipart/form-data">
                    <textarea name="css" class="code"><?php if (file_get_contents("../assets/main.css")) {
                                                            echo file_get_contents("../assets/main.css");
                                                        } ?></textarea><br>

                    <input type="submit" value="Save" name="submit"><br>
                </form>
            </div>
            <hr>

            <!-- End page content -->
        </div>

        <script src="components/sidebar.js"></script>
        <script src="components/settings.js.php"></script>
    <?php } ?>
</body>

</html>