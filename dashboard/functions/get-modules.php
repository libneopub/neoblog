<?php
// Get modules from modules.json

function getModules()
{
    $file = "modules.json";

    if (file_exists($file) && filesize($file) > 0) {
        $handle = fopen($file, "a+");
        $contents = fread($handle, filesize($file));
        $modules = json_decode($contents);
        fclose($handle);

        return $modules;
    }
}
