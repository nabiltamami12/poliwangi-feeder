// SIDEBAR - submenu
jQuery(function ($) {
    // $(".nav-item-dropdown-content").css("display", "none");
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

    // mini sidebar as default
    if ($("body").hasClass("g-sidenav-pinned")) {
        $("body").removeClass("g-sidenav-pinned g-sidenav-show");
        $("body").addClass("g-sidenav-hidden");
        $(".sidenav-toggler").removeClass("active");
        $(".navbar-brand").addClass("d-none");
    }

    $(".sidenav").hover(function () {
        $(".navbar-brand").removeClass("d-none");
    });
});
