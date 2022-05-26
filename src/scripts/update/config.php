<?php
session_start();

function change_config_file_settings($file_path, $new_settings)
{

    $old_scope = get_defined_vars();
    include($file_path);
    $new_scope = get_defined_vars();

    $old_settings = array_diff($new_scope, $old_scope);
    $updated_settings = array_merge($old_settings, $new_settings);

    $new_file_content = "<?php\n\n";
    foreach ($updated_settings as $name => $val) {
        $new_file_content .= "\${$name} = " . var_export($val, true) . ";\n";
    }

    file_put_contents($file_path, $new_file_content);
}

if ($_SESSION['login'] == true) {
    $new_settings = array(
        "site_title" => $_POST["title"],
        "site_description" => $_POST["description"],
        "site_author" => $_POST["author"],
        "site_language" => $_POST["language"],
        "site_domain" => $_POST["domain"],
    );
    change_config_file_settings("../../../config.php", $new_settings);

    header("Location: ../../settings.php?success-siteinfo");
} else {
    header('Location: ../../index.php');
}
