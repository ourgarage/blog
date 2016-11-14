var locale = $('#date_published').data('datepicker-params');

$('#date_published').datetimepicker({
    format: 'yyyy-mm-dd hh:ii',
    language: locale,
    todayHighlight: true,
    autoclose: true
});
