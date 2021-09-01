// SIDEBAR - submenu
jQuery(function ($) {
    $(".nav-item-dropdown-content").css("display", "none");
    $(".nav-link").click(function () {
        $(".nav-link").not(this).removeClass("open");
        $(".nav-link").not(this).next().slideUp(300);
        $(this).toggleClass("open");
        $(this).next().slideToggle(300);
    });

    $(".nav-link-submenu").click(function () {
        $(".nav-link-submenu").not(this).removeClass("open");
        $(".nav-link-submenu").not(this).next().slideUp(300);
        $(this).toggleClass("open");
        $(this).next().slideToggle(300);
    });
});

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
