$(document).ready(function () {
    $(".waves-effect.waves-light.btn").on('click', function() {
        console.log("Called buy");
        var product = $(this).attr("value");
        console.log(product);

        $.ajax({
            url: '../php/add-to-cart.php'
            , type: 'POST'
            , data: {
                "productType": product
            }
            , success: function (response) {
                console.log(response);
            }
        });

    });

})