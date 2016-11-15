var lang = $('#date_published').data('datetimepicker-locale');

$('#date_published').datetimepicker({
    format: 'Y-MM-DD HH:mm:ss',
    locale: lang
});
