<?php
// Script to publish a new post from the editor.

require "../../vendor/autoload.php";
require "../../../utils.php";
require "../../functions/auth.php";

redirectIfNotLoggedIn();

$tags = $_POST["tags"];
if ($tags !== "Add tags") {
    $tags = explode(",", $tags);
} else {
    $tags = [];
}

$content = quillToMarkdown($_POST["text"]);

$post = newNote($content, $tags);
$url = publishPost($post);
sendWebmentions($url);

header("Location: $url");

function quillToMarkdown($input_json)
{
    $parser = new DBlackborough\Quill\Parser\Markdown();
    $renderer = new DBlackborough\Quill\Renderer\Markdown();

    $parser->load($input_json)->parse();
    return $renderer->load($parser->deltas())->render();
}
