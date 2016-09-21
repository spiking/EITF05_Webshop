$(document).ready(function() {
    $('#empty-btn').on('click', function() {
        console.log('empty cart');
        $('#cart-table').empty();
        $('#cart-empty').empty();
        $('#cart-empty-hidden').show();
        $("td.total-price").empty();
        $("td.total-price").append("0 SEK");
        
        $.ajax({
		type: 'POST',
		url: '../php/empty-cart.php',
		data: 'empty',
		dataType: 'json',
		success: function(data) {    
			if (data.error == true) {
				console.log('Error');
			} else {
				console.log('Success');
			}
		},
		complete: function() {
			console.log('ajax call completed');
		},
		error: function(exception) {
			console.log(exception);
		}
	});
    
	return false;
        
        
    });
})