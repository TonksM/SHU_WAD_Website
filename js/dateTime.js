$('#timepicker').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:15
});
$('#datepicker').datetimepicker({
	yearOffset:0,
	lang:'ch',
	timepicker:false,
	format:'Y-m-d',
	formatDate:'Y-m-d',
	minDate:'+1970/01/02', // yesterday is minimum date
	maxDate: '+1971/01/02',
	defaultDate: '+1970/01/02'
});