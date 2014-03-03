$(document).ready(function() {
	$('.panel').on('click', 'button', function() {
		var id = this.id;
		var checkbox = $(this).next('form input:checkbox');
		var checkedTotal = $(this).parent('.panel').find('input[type=checkbox]:checked').length;
		if (checkbox.prop('checked')) checkedTotal--;

		if (checkedTotal == 2 ) {
			$(this).removeClass('btn-success');
			checkbox.prop('checked', false);
			alert('limit has been reached');
		} else{
			$(this).toggleClass('btn-success');
			checkbox.prop("checked", !checkbox.prop("checked"));
		}

		console.log(checkedTotal);

	});

	console.log('ready');
});
