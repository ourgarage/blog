$('.add-tag').on('click', function(){
    var inputTags = $('#inputTags');
    var newTag = $(this).attr('data-tag');
    $('#inputTags').tagsinput('add', newTag);
});

var param = $('#date_published').data('datetimepicker-locale');

$('#date_published').datetimepicker({
    format: param.format,
    locale: param.lang
});
