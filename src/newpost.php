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

                <h2 class="title" contenteditable>Enter post title</h2>
                <p class="tags" contenteditable>Add tags</p>

            </div>

            <!-- Include stylesheet for Quill -->
            <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

            <!-- Create the editor container for Quill -->
            <div id="editor">

            </div>

            <!-- Include the Quill library -->
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

            <div class="w3-container"><br>

                <button onclick="submit_newpost()">Post</button>

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