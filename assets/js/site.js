$(document).ready(function() {
	$('.panel-body').on('click', 'button', function() {
		var serviceID = this.id;
		var profitCenter = $(this).parent().parent().find('.panel-heading').attr('id');		
		var siteID = $('#sitePicker').val();
		
		var checkbox = $(this).next('form input:checkbox');
		var checkedTotal = $(this).parent('.panel-body').find('input[type=checkbox]:checked').length;
		var messageDiv = $('#message');
		if (checkbox.prop('checked')) checkedTotal--;

		if (checkedTotal >= 5 ) {
			$(this).removeClass('btn-success');
			checkbox.prop('checked', false);
			//updateDatabase('delete', siteID, profitCenter, serviceID);
			messageDiv.html('limit has been reached for section').addClass('alert-danger').slideDown();
		} else{
			$(this).toggleClass('btn-success');
			checkbox.prop("checked", !checkbox.prop("checked"));
			if ($(this).hasClass('btn-success')) {				
				updateDatabase('add', siteID, profitCenter, serviceID);	
			} else {				
				updateDatabase('delete', siteID, profitCenter, serviceID);
			}
			
			
			if (messageDiv.is(':visible')) removeMessage(); //messageDiv.slideUp();			
		}
	});
	$('.panel-heading').on('click', 'button', function() {				
		var panel = $(this).parent().parent().next();				
		if ($(this).hasClass('btn-custom')) {
			panel.slideDown();
			$(this).addClass('btn-success');
			$(this).next('button').removeClass('btn-success');
		} else {
			panel.slideUp();
			$(this).addClass('btn-success');
			$(this).prev('button').removeClass('btn-success');
		}	
		//console.log(custom);
	});
	
	function updateDatabase(method, siteID, profitCenter, serviceID) {		
		var request = $.ajax({
			url: "ajax-services.php",
			type: "POST",
			data: { method: method, siteID : siteID, profitCenter : profitCenter, serviceID : serviceID },
			dataType: "html"
		});
		request.done(function ( msg ) {
			$("#message").html(msg);
		});
		request.fail( function( jqXHR, textStatus ) {
			alert("Request failed: " + textStatus);
		});
	}
	
	function removeMessage() {
		var messageDiv = $('#message');
		messageDiv.slideUp(400, function() {
			messageDiv.html('');	
		});
	}
	
	var sitePickerForm = $('#site');
	var sitePicker = $('#sitePicker').val();
	
	sitePickerForm.on('change', function() {
		sitePickerForm.submit();
			
	});
	
	
	
	console.log('ready');
});
