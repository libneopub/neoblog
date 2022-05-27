<?php
// A component to render the page header

// $modules is defined in sidebar.php,
// but if this component is ran standalone, it
// will still work

if (!isset($modules)) {
    require __DIR__ . "/../functions/get-modules.php";
    $modules = getModules();
}

foreach ($modules as $module) {
    if ($module->filename === $pagename) {

?>
        <header class="w3-container module-header">
            <h4><b><i class="<?php echo $module->icon; ?>"></i> <?php echo $module->name; ?></b></h4>
        </header>
<?php

    }
}

?>