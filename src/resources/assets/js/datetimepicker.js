var param = $('#date_published').data('datetimepicker-locale');

$('#date_published').datetimepicker({
    format: param.format,
    locale: param.lang
});
