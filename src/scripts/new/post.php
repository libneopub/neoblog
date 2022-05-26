<?php
session_start();

require "../../vendor/autoload.php";
require "../../../utils.php";

if (isset($_SESSION['name']) && $_SESSION['login'] === true) {
    $tags = explode(",", $_POST["tags"]);
    $content = quillToMarkdown($_POST["text"]);

    $post = newNote($content, $tags);
    $url = publishPost($post);
    sendWebmentions($url);

    header("Location: $url");
} else {
    header('Location: ../../index.php');
}

function quillToMarkdown($input_json) {
    $parser = new DBlackborough\Quill\Parser\Markdown();
    $renderer = new DBlackborough\Quill\Renderer\Markdown();

    $parser->load($input_json)->parse();
    return $renderer->load($parser->deltas())->render();
}