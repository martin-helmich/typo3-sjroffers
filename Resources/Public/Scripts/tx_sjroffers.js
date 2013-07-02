$(function() {
	$.datepicker.setDefaults({
		regional: 'de',
		duration: ''
	});
	$("#startdate").datepicker({ defaultDate: 'today' });
	$("#enddate").datepicker({ defaultDate: 'today' });
	
	$("#toggleButton").click(function() {
		$("#toggleForm").toggle('blind');
		return false;
	});
	
	$(".toggleButton").click(function() {
		$($(this).parent().find(".toggleForm")).toggle('blind');
		return false;
	});
	
	$(function() {
		$("#dialog").dialog({
			bgiframe: true,
			modal: true,
			buttons: {
				Ok: function() {
					$(this).dialog('close');
				}
			}
		});
	});
	
	$('#addAttendanceFee').click(function(event){
		event.preventDefault();
		$('#attendanceFeeContainer').append('<div class="singleAttendanceFee"><input size="6" type="text" name="tx_sjroffers_list[attendanceFees][amount][]" value="" />&nbsp;&euro;&nbsp;&nbsp;\ngültig&nbsp;für&nbsp;<input size="16" type="text" name="tx_sjroffers_list[attendanceFees][comment][]" value="" />\n<button class="removeAttendanceFee">löschen</button><br /></div>');
		$('.removeAttendanceFee').bind('click', function(event){
		    event.preventDefault();
		    $(this).parent('div.singleAttendanceFee').remove();
		});
	});

	$('.removeAttendanceFee').bind('click', function(event){
	    event.preventDefault();
	    $(this).parent('div.singleAttendanceFee').remove();
	});
	
});