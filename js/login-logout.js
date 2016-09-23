$('#btn-login').click(function() {
	console.log('clicked login button');
	$.ajax({
		type: 'POST',
		url: '../php/login.php',
		data: $('#login-form').serialize(),
		dataType: 'json',
		success: function(data) {    
			if (data.error == true) {
				console.log('Invalid credentials.');
				$('#login-error').html(data.msg);
				$('#login-error').fadeIn(1000);
				$('#login-error').fadeOut(3000);
			} else {
				console.log('Correct credentials.');
				window.location.href = 'index.php';
			}
		},
		beforeSend: function() {

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

$('#btn-register').click(function() {
	console.log('clicked register button');
	$.ajax({
		type: 'POST',
		url: '../php/login.php',
		data: $('#register-form').serialize(),
		dataType: 'json',
		success: function(data) {    
			if (data.error == true) {
                console.log("Failures")
				$('#register-error').html(data.msg);
				$('#register-error').fadeIn(1000);
				$('#register-error').fadeOut(3000);
			} else {
                console.log("Successfull reg")
                window.location.href = 'index.php';
				$('#register-success').html(data.msg);
				$('#register-success').fadeIn(1000);
				$('#register-success').fadeOut(3000);
			}
		},
		beforeSend: function() {

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


$(window, document, undefined).ready(function () {

    $('input').blur(function () {
        var $this = $(this);
        if ($this.val())
            $this.addClass('used');
        else
            $this.removeClass('used');
    });

    var $ripples = $('.ripples');

    $ripples.on('click.Ripples', function (e) {

        var $this = $(this);
        var $offset = $this.parent().offset();
        var $circle = $this.find('.ripplesCircle');

        var x = e.pageX - $offset.left;
        var y = e.pageY - $offset.top;

        $circle.css({
            top: y + 'px'
            , left: x + 'px'
        });

        $this.addClass('is-active');

    });

    $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function (e) {
        $(this).removeClass('is-active');
    });

});

function toggleForm(type) {
    
    console.log(type)
    
    if(type == "register") {
        document.getElementById('register-form').style.display = "block";
        document.getElementById('login-form').style.display = "none";
    } else {
        document.getElementById('register-form').style.display = "none";
        document.getElementById('login-form').style.display="block";
    }
}

function clearData() {

}