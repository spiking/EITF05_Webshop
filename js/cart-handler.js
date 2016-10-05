// Add product to cart

$(document).ready(function () {
    $(".waves-effect.waves-light.btn").on('click', function() {
        var product = $(this).attr("value");
	var token = $(this).attr("data-token");
        $.ajax({
            url: '../php/cart-handler.php'
            , type: 'POST'
            , data: {
                "productType": product,
                "ID": token
            }
            , success: function (response) {
                console.log(response);
            }
        });

    });

})


// Empty cart

$(document).ready(function() {
    $('#empty-btn').on('click', function() {
        console.log('empty cart');
        $('#cart-table').empty();
        $('#cart-empty').empty();
        $('#cart-empty-hidden').show();
        $("td.total-price").empty();
        $("td.total-price").append("0 SEK");
	var token = $(this).attr("data-token");

        $.ajax({
            type: 'POST',
            url: '../php/cart-handler.php',
            data: {
                "empty": "empty",
                "ID": token
            },
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

// Update cart

$(document).ready(function() {

    $("#ZamZung7_amount").change(function() {
        var amount = $('#ZamZung7_amount').find(":selected").text();
	var token = document.getElementById("ZamZung7_amount").getAttribute("data-token");
        $.ajax({
            url: '../php/cart-handler.php',
            type: 'POST',
            data: {
                "quantity_ZamZung7": amount,
                "ID": token
            },
            success: function(response) {
                console.log(response);
            }
        });
        window.location.reload();
    });

    $("#iFone_amount").change(function() {
        var amount = $('#iFone_amount').find(":selected").text();
	var token = document.getElementById("iFone_amount").getAttribute("data-token");
        $.ajax({
            url: '../php/cart-handler.php',
            type: 'POST',
            data: {
                "quantity_iFone7": amount,
                "ID": token
            },
            success: function(response) {
                console.log(response);
            }
        });
        window.location.reload();
    });

    $("#GoogleX_amount").change(function() {
        var amount = $('#GoogleX_amount').find(":selected").text();
	var token = document.getElementById("GoogleX_amount").getAttribute("data-token");
        $.ajax({
            url: '../php/cart-handler.php',
            type: 'POST',
            data: {
                "quantity_GoogleX": amount,
                "ID": token
            },
            success: function(response) {
                console.log(response);
            }
        });
        window.location.reload();
    });
})

// Validate cart form

function validateForm() {

    console.log("Validate User Input");

    var username = document.getElementById("name").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var creditcard = document.getElementById("creditcard").value;

    var usernameReg = /^[0-9a-zA-Z_.-]+$/;
    var pwReg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/;
    var emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var creditcardReg = /^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})/;

    // Credit card should be added, annoying for testing though

    if (usernameReg.test(username) && emailReg.test(email)) {

        // Input is valid, check credentials

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

// Modern browsers got back-forward cache (BFCache) when user click back-button, reset form in cart

$(document).ready(function() {
    $(window).bind("pageshow", function() {
        var form = $('form');
        console.log("Reset form!");
        form[0].reset();
    });
});