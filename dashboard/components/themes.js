function populateThemeList(themes) {
    let themesListContainer = document.querySelector(".themes");

    themes.forEach((theme) => {
        let themeContainer = document.createElement("div");
        themeContainer.classList.add("theme");

        let screenshot = document.createElement("img");
        screenshot.src = `https://neopublished.github.io/themes/${theme.screenshot}`;
        screenshot.classList.add("screenshot");
        themeContainer.appendChild(screenshot);

        let themeContentContainer = document.createElement("div");

        let themeTitle = document.createElement("h3");
        themeTitle.innerText = theme.name;
        themeContentContainer.appendChild(themeTitle);

        let themeDescription = document.createElement("p");
        themeDescription.innerText = theme.description;
        themeContentContainer.appendChild(themeDescription);

        let themeInfo = document.createElement("p");

        let themeAuthorPrefix = document.createElement("strong");
        themeAuthorPrefix.innerText = "Author:";
        themeInfo.appendChild(themeAuthorPrefix);
        themeInfo.innerHTML += ` ${theme.author}<br>`;

        let themeLicensePrefix = document.createElement("strong");
        themeLicensePrefix.innerText = "License:";
        themeInfo.appendChild(themeLicensePrefix);
        themeInfo.innerHTML += ` ${theme.license}`;

        let downloadButton = document.createElement("button");
        downloadButton.innerText = "Install this theme";
        downloadButton.classList.add("button-primary");
        downloadButton.onclick = () => {
            let url = `https://neopublished.github.io/themes/${theme.url}`;
            window.location = `scripts/new/theme.php?url=${encodeURIComponent(url)}`;
        };

        themeContentContainer.appendChild(themeInfo);
        themeContentContainer.appendChild(downloadButton);
        themeContainer.appendChild(themeContentContainer);

        themesListContainer.appendChild(themeContainer);
    });
}

window.onload = () => {
    fetch("https://neopublished.github.io/themes/themes.json")
        .then((response) => response.json())
        .then((json) => populateThemeList(json));
};
