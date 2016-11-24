$('.add-tag').on('click', function() {
    var $inputTags = $('#inputTags');
    var newTag = $(this).attr('data-tag');
    $inputTags.tagsinput('add', newTag);
});

var language = $('#date_published').data('datetimepicker-locale');
var dateFormat = $('#date_published').data('datetimepicker-format');

$('#date_published').datetimepicker({
    format: dateFormat,
    locale: language
});
