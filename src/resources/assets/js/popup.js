/*$(function(){
    $("[data-confirm]").on("click", function(){
        var confirm = $(this).data("confirm");
        buttonConfirmation(event, confirm);
    });
});*/

$(function () {
    $("[data-params]").on("click", function () {
        var params = $(this).data("params");

        swal({
                title: "Ajax request example",
                text: "Submit to run ajax request",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function () {
                setTimeout(function () {
                    swal("Ajax request finished!");
                }, 2000);
            });
    });
});

