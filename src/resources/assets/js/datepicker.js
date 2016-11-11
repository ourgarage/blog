var locale = $('#date_published').data('datepicker-params');

$('#date_published').datepicker({
    format: 'yyyy-m-d',
    language: locale,
    todayHighlight: true
});
