$(".customSelect").each(function () {
    var classes = $(this).attr("class"),
        id = $(this).attr("id"),
        name = $(this).attr("name");
    var template = '<div class="' + classes + '">';
    template +=
        '<span class="customSelect-trigger">' +
        $(this).attr("placeholder") +
        "</span>";
    template += '<div class="custom-options">';
    $(this)
        .find("option")
        .each(function () {
            template +=
                '<span class="custom-option ' +
                $(this).attr("class") +
                '" data-value="' +
                $(this).attr("value") +
                '">' +
                $(this).html() +
                "</span>";
        });
    template += "</div></div>";

    $(this).wrap('<div class="customSelect-wrapper"></div>');
    $(this).hide();
    $(this).after(template);
});
$(".custom-option:first-of-type").hover(
    function () {
        $(this).parents(".custom-options").addClass("option-hover");
    },
    function () {
        $(this).parents(".custom-options").removeClass("option-hover");
    }
);
$(".customSelect-trigger").on("click", function () {
    $("html").one("click", function () {
        $(".customSelect").removeClass("opened");
    });
    $(this).parents(".customSelect").toggleClass("opened");
    event.stopPropagation();
});

$(".customSelect-trigger").click(function (evt) {
    $(this).addClass("selecton");
    evt.stopPropagation();
});

$(document).click(function () {
    $(".customSelect-trigger").removeClass("selecton");
});

$(".custom-option").on("click", function () {
    $(this)
        .parents(".customSelect-wrapper")
        .find("select")
        .val($(this).data("value"));
    $(this)
        .parents(".custom-options")
        .find(".custom-option")
        .removeClass("selection");
    $(this).addClass("selection");
    $(this).parents(".customSelect").removeClass("opened");
    $(this)
        .parents(".customSelect")
        .find(".customSelect-trigger")
        .text($(this).text());
});
