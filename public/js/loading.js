$(document).ready(function () {
    $(window).on("load", function () {
        $(".loaderImage-wrapper").fadeOut("slow");
    });

    $(window).on("load", function () {
        $(".loaderScreen-wrapper").fadeOut("slow");
    });

    $("#getData").on("click", function () {
        $.ajax({
            type: "GET",
            url: "https://jsonplaceholder.typicode.com/users",
            dataType: "json",

            beforeSend: function () {
                $("#loader").show();
            },

            complete: function () {
                $("#loader").hide();
            },

            success: function (data) {
                let output = `<p class="mt-2 text-success font-weight-bold">Success Get Data</p>`;
                for (let i in data) {
                    output += `
                    <ul>
                        <li><span class="font-weight-bold">User id:</span> ${data[i].id}</li>
                        <li><span class="font-weight-bold">Name:</span> ${data[i].username}</li>
                        <li><span class="font-weight-bold">Email:</span> ${data[i].email}</li>
                    </ul>
                    `;
                }
                $("#result").html(output);
            },

            error: function () {
                $("#result").html(
                    '<p class="mt-2 text-danger font-weight-bold">Failed to Get Data</p>'
                );
            },
        });
    });
});
