// JS to make sidebar interactive on mobile

var sidebar = document.getElementById("sidebar");
var overlayBackground = document.getElementById("overlay-bg");

function openSidebar() {
    if (sidebar.style.display === "block") {
        sidebar.style.display = "none";
        overlayBackground.style.display = "none";
    } else {
        sidebar.style.display = "block";
        overlayBackground.style.display = "block";
    }
}

function closeSidebar() {
    sidebar.style.display = "none";
    overlayBackground.style.display = "none";
}
