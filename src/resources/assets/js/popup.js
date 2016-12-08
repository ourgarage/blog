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
            title: 'Are you sure?',
            text: params.message,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function () {
            swal(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        })

    });
});

