<?php
// Little JS script to pull a comment count from webmention.io

include __DIR__ . "/../../config.php";
?>

<span class="count webmention-count">0</span>
<script>
    let webmentionCount = document.querySelector(".webmention-count");

    fetch("https://webmention.io/api/count?target=<?= $site_url ?>")
    .then(response => response.json())
    .then(json => webmentionCount.innerText = json.count);
</script>