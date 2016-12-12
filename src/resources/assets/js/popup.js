$(function () {
    $("[data-confirm]").on("click", function () {
        var confirm = $(this).data("confirm");
        buttonConfirmation(event, confirm);
    });
});
