<?php
// Component to render the sidebar

require __DIR__ . "/../../config.php";
require __DIR__ . "/../functions/get-modules.php";
$modules = getModules();
?>

<button class="w3-hide-large w3-left" onclick="openSidebar()"><i class="fa fa-bars"></i> Menu</button>

<nav class="w3-sidebar w3-collapse w3-light-grey" style="z-index:3;width:300px;" id="sidebar"><br>

    <div class="w3-hide-large">
        <div class="w3-bar-block editor-nav">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large" onclick="closeSidebar()" title="close menu"><i class="fa fa-remove fa-fw"></i> Close Menu</a>
        </div>

        <hr>
    </div>

    <div class="w3-container w3-row">
        <div class="w3-col s3">
            <img src="<?= $site_author_profile_picture ?>" class="w3-circle w3-margin-right profile-picture">
        </div>

        <div class="w3-col s9 w3-bar">
            <span>Welcome, <strong><?= $site_author ?></strong></span><br>
            <a href='../index.php'><i class="fa fas fa-arrow-left"></i> Back</a> |
            <a href="auth.php?logout">Logout</a>
        </div>
    </div>

    <hr>

    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>

    <div class="w3-bar-block editor-nav">
        <?php
        foreach ($modules as $module) {
            if ($module->in_menu === true) {
                if ($module->filename === $pagename) { ?>
                    <a href="#" class="w3-bar-item w3-padding w3-blue">
                        <i class="<?php echo $module->icon; ?>"></i>  <?php echo $module->name; ?>
                    </a>
                <?php } else { ?>
                    <a href="<?php echo $module->filename; ?>" class="w3-bar-item w3-button w3-padding">
                        <i class="<?php echo $module->icon; ?>"></i>  <?php echo $module->name; ?>
                    </a><?php

                    }
                }
            } ?>

        <br><br>
    </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="closeSidebar()" id="overlay-bg"></div>