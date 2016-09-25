function validateFormLogin() {

    console.log("Validate User Input");

    var username = document.getElementById("name").value;
    console.log(username);

    var password = document.getElementById("password").value;
    console.log(password);

    var usernameAndPwReg = /^[0-9a-zA-Z_.-]+$/;

    if (usernameAndPwReg.test(username) && usernameAndPwReg.test(password)) {
        console.log("Input Valid");

        $.ajax({
            type: 'POST',
            url: '../php/login.php',
            data: $('#login-form').serialize(),
            dataType: 'json',
            success: function(data) {
                if (data.error == true) {
                    console.log(data.msg);
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
    } else {

        $('#login-error').html('Invalid Input');
        console.log("Invalid input login form");

        $('#login-error').fadeIn(500);
        $('#login-error').fadeOut(3000);
        $('#login-error').fadeOut(500);
    }
    return false;
}

function validateFormReg() {

    console.log("Validate User Input");

    if (!document.getElementById("nameReg") != null) {
        var username = document.getElementById("nameReg").value;
        console.log(username);
    }
    if (!document.getElementById("passwordReg") != null) {
        var password = document.getElementById("passwordReg").value;
        console.log(password);
    }
    if (document.getElementById("addressReg") != null) {
        var address = document.getElementById("addressReg").value;
        console.log(address);
    }

    var usernameAndPwReg = /^[0-9a-zA-Z_.-]+$/;
    // var addressReg = /^[a-zA-Z0-9\s,'-]*$/;
    // Add address, annoying for testing

    if (usernameAndPwReg.test(username) && usernameAndPwReg.test(password)) {
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
    } else {

        $('#register-error').html('Invalid Input');
        console.log("Invalid input login form");

        $('#register-error').fadeIn(500);
        $('#register-error').fadeOut(3000);
        $('#register-error').fadeOut(500);
    }

    return false;
}

$(window, document, undefined).ready(function() {

    $('input').blur(function() {
        var $this = $(this);
        if ($this.val())
            $this.addClass('used');
        else
            $this.removeClass('used');
    });

    var $ripples = $('.ripples');

    $ripples.on('click.Ripples', function(e) {

        var $this = $(this);
        var $offset = $this.parent().offset();
        var $circle = $this.find('.ripplesCircle');

        var x = e.pageX - $offset.left;
        var y = e.pageY - $offset.top;

        $circle.css({
            top: y + 'px',
            left: x + 'px'
        });

        $this.addClass('is-active');

    });

    $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
        $(this).removeClass('is-active');
    });

});

function toggleForm(type) {

    console.log(type)

    if (type == "register") {
        document.getElementById('register-form').style.display = "block";
        document.getElementById('login-form').style.display = "none";
    } else {
        document.getElementById('register-form').style.display = "none";
        document.getElementById('login-form').style.display = "block";
    }
}

// Modern browsers got back-forward cache (BFCache) when user click back-button, reset all forms
$(document).ready(function() {
    $(window).bind("pageshow", function() {
        $('form').each(function() { this.reset() });
    });
});