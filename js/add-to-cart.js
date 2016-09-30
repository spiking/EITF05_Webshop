$(document).ready(function () {
    console.log(document.cookie);
    var token = document.cookie.split('=')[1];
    $(".waves-effect.waves-light.btn").on('click', function() {
        console.log("Called buy");
        var product = $(this).attr("value");
        console.log(product);

        $.ajax({
            url: '../php/add-to-cart.php'
            , type: 'POST'
            , data: {
                "productType": product,
                "token": token
            }
            , success: function (response) {
                console.log(response);
            }
        });

    });

})