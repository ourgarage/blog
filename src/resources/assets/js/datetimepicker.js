var locale = $('#date_published').data('datetimepicker-locale');

$('#date_published').datetimepicker({
    format: 'yyyy-mm-dd hh:ii:ss',
    language: locale,
    todayHighlight: true,
    autoclose: true
});
