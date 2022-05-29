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
        <?php
        // $url = "https://quill.p3k.io/auth/start?me=$site_domain&client_id=https%3A%2F%2Fquill.p3k.io%2F&redirect_uri=https%3A%2F%2Fquill.p3k.io%2Fauth%2Fcallback";
        // header("Location: $url");
        ?>

        <?php include "components/sidebar.php"; ?>

        <div class="w3-main module-content">

            <?php include "components/module-header.php" ?>

            <div class="w3-container">

                <!-- Note posts do not have a title -->
                <!-- <h2 class="title" contenteditable>Enter post title</h2> -->
                <label for="tags" style="display: inline">Tags: </label>
                <input type="text" name="tags" class="tags" placeholder="Add tags" style="border: 0; margin-left: 0;">

            </div>

            <?php include "components/quill.php"; ?>

            <div class="w3-container"><br>
                <button onclick="submit()">Post</button>
            </div>

            <hr>

            <form style="display:none !important;" class="form" action="scripts/new/post.php" method="post">
                <input id="title" type="text" name="title">
                <input id="content" type="text" name="text">
                <input id="tags" type="text" name="tags">
                <input type="submit">
            </form>

            <!-- End page content -->
        </div>

        <script src="components/sidebar.js"></script>
        <script src="components/quill.js"></script>
    <?php } ?>
</body>

</html>