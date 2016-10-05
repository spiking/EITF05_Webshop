function validateFormLogin() {

    var username = document.getElementById("name").value;
    var password = document.getElementById("password").value;
    var usernameReg = /^[0-9a-zA-Z_.-]+$/;
    var msg = "";

    var password = document.getElementById("password").value;

    if (usernameReg.test(username)) {
        console.log("Input username Valid");
    } else {
        msg = 'Invalid characters in username';
    }

    if (checkPwdReq(password)) {
        console.log("Input password Valid");
    } else {
        msg = 'The password must contain at least:</br>8 characters</br>A Number</br>A special character</br>A lower case</br>An upper case';
    }

    if (msg.length == 0) {
        postData('#login-form');
    } else {
        $('#login-error').html(msg);
        $('#login-error').fadeIn(500);
        $('#login-error').delay(3000);
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

    var usernameReg = /^[0-9a-zA-Z_.-]+$/;
    // var addressReg = /^[a-zA-Z0-9\s,'-]*$/;
    // Add address, annoying for testing

    var msg = "";

    if (usernameReg.test(username)) {
        console.log("Input username Valid");

    } else {
        msg = 'Invalid characters in username';
    }

    if (checkPwdReq(password)) {
        console.log("Input password Valid");
    } else {
        msg = 'The password must contain at least:</br>8 characters</br>A Number</br>A special character</br>A lower case</br>An upper case';
    }

    if (msg.length == 0) {
        console.log('clicked register button');
        postData('#register-form');
    } else {
        $('#register-error').html(msg);
        console.log("Invalid input reg form");

        $('#register-error').fadeIn(500);
        $('#register-error').delay(3000);
        $('#register-error').fadeOut(500);
    }

    return false;
}

function checkPwdReq(pwd) {
    // var nbr = /[0-9]+/;
    // var special = /[\W]+/;
    // var lower = /[a-z]+/;
    // var upper = /[A-Z]+/;
    // return pwd.length > 7 && nbr.test(pwd) && special.test(pwd) && lower.test(pwd) && upper.test(pwd);
    return true;
}

// Login/register user

function postData(formType) {
    $.ajax({
        type: 'POST',
        url: '../php/login.php',
        data: $(formType).serialize() + "&g-recaptcha-response=" + grecaptcha.getResponse(),
        dataType: 'json',
        success: function(data) {
            if (data.error == true) {
                console.log(data.msg);

                if (formType == "#login-form")
                    var errorType = "#login-error";
                else if (formType == "#register-form")
                    var errorType = "#register-error";

                if (data.msg == "Incorrect Credentials") {
                  grecaptcha.reset();
                }

                $(errorType).html(data.msg);
                $(errorType).fadeIn(500);
                $(errorType).delay(3000);
                $(errorType).fadeOut(500);

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
}

// Change form

function toggleForm(type) {
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
        $('form').each(function() {
            this.reset()
        });
    });
});

// Ripple effect on button

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
