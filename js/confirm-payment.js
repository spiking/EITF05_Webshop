function validateForm() {

    console.log("Validate User Input");

    var username = document.getElementById("name").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var creditcard = document.getElementById("creditcard").value;

    var usernameAndPwReg = /^[0-9a-zA-Z_.-]+$/;
    var emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var creditcardReg = /^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})/;

    // Credit card should be added, annoying for testing though

    if (usernameAndPwReg.test(username) && usernameAndPwReg.test(password) && emailReg.test(email)) {
        console.log("Input Valid");
        console.log("Check username and password");

        $('#info-form').submit(function() {
            console.log("Ajax request initiated");
            $.ajax({
                type: 'POST',
                url: '../php/confirm-credentials.php',
                data: $('#info-form').serialize(),
                dataType: 'json',
                success: function(data) {
                    if (data.error == true) {
                        console.log(data.msg);
                        $('#confirm-error').html(data.msg);
                        $('#confirm-error').fadeIn(500);
                        $('#confirm-error').delay(3000);
                        $('#confirm-error').fadeOut(500);
                    } else {
                        console.log('Correct credentials.');
                        window.location.href = 'payment-completed.php';
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
            // Kill page refresh
            return false;
        });

    } else {
        console.log("Invalid input");
        $('#confirm-error').html('Invalid Input');
        $('#confirm-error').fadeIn(500);
        $('#confirm-error').delay(3000);
        $('#confirm-error').fadeOut(500);
        return false;
    }
}

// Modern browsers got back-forward cache (BFCache) when user click back-button, reset form
$(document).ready(function() {
    $(window).bind("pageshow", function() {
        var form = $('form');
        console.log("Reset form!");
        form[0].reset();
    });
});