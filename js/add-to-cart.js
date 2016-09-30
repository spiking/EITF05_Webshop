$(document).ready(function () {
    $(".waves-effect.waves-light.btn").on('click', function() {
        console.log("Called buy");
        var product = $(this).attr("value");
        console.log(product);
        console.log(document.cookie);

        $.ajax({
            url: '../php/add-to-cart.php'
            , type: 'POST'
            , data: {
                "productType": product, "ID": document.cookie
            }
            , success: function (response) {
                console.log(response);
            }
        });

    });

})
