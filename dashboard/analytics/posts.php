<?php
// JS script to get the count of 
// posts (for the current year)

include __DIR__ . "/../../config.php";
include __DIR__ . "/../../utils.php";
?>

<span class="count post-count">0</span>
<script>
    let postCount = document.querySelector(".post-count");

    fetch("<?= $site_url ?>/content/<?= $current_year ?>.json")
    .then(response => response.json())
    .then(json => postCount.innerText = json.length);
</script>