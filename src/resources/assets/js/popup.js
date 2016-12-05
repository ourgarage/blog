$(function(){
    $(".popup-blog").on("click", function(){
        var confirm = $(this).data("confirm");
        buttonConfirmation(event, confirm);
    });
});
