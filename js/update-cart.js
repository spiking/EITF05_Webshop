$(document).ready(function () {
    console.log(document.cookie);
    var token = document.cookie.split('=')[1];
    console.log(token);

    $("#ZamZung7_amount").change(function () {
        console.log("Called update");
        var amount = $('#ZamZung7_amount').find(":selected").text();
        console.log(amount);
        console.log(document.cookie);

        $.ajax({
            url: '../php/update-cart.php'
            , type: 'POST'
            , data: {
                "quantity_ZamZung7": amount,
                "token": token
            }
            , success: function (response) {
                console.log(response);
            }
        });
        window.location.reload();
    });

    $("#iFone_amount").change(function () {
        console.log("Called update");
        var amount = $('#iFone_amount').find(":selected").text();
        console.log(amount);

        $.ajax({
            url: '../php/update-cart.php'
            , type: 'POST'
            , data: {
                "quantity_iFone7": amount,
                "token": token
            }
            , success: function (response) {
                console.log(response);
            }
        });
        window.location.reload();
    });



    $("#GoogleX_amount").change(function () {
        console.log("Called update");
        var amount = $('#GoogleX_amount').find(":selected").text();
        console.log(amount);

        $.ajax({
            url: '../php/update-cart.php'
            , type: 'POST'
            , data: {
                "quantity_GoogleX": amount,
                "token": token
            }
            , success: function (response) {
                console.log(response);
            }
        });
        window.location.reload();
    });

})