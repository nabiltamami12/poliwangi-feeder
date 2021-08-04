// SIDEBAR - submenu
const accordions = document.getElementsByClassName("nav-item");
for (i = 0; i < accordions.length; i++) {
    accordions[i].style.cursor = "pointer";
    accordions[i].addEventListener("click", function () {
        this.classList.toggle("showsubmenu");
    });
}

setInterval(function () {
    // SIDEBAR_HIDE_SHOW
    let width = document.getElementById("sidenav-main").offsetWidth;
    const sidebar_text = document.querySelectorAll(".nav-link-text");

    if (width < 100) {
        for (i = 0; i < sidebar_text.length; i++) {
            sidebar_text[i].style.display = "none";
        }
    } else {
        for (i = 0; i < sidebar_text.length; i++) {
            sidebar_text[i].style.display = "block";
        }
    }
}, 10);
