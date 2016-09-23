//Check username and password
//
//$(document).ready(function () {
//    $('#confirm-btn').click(function () {
//        $.ajax({
//            type: 'POST'
//            , url: '../php/login.php'
//            , data: $('#info-form').serialize()
//            , dataType: 'json'
//            , success: function (data) {
//                if (data.error == true) {
//                    console.log('Invalid credentials.');
//                    $('#confirm-error').html('Incorrect Credentials');
//                    $('#confirm-error').fadeIn(1000);
//                    $('#confirm-error').delay(2000);
//                    $('#confirm-error').fadeOut(3000);
//                } else {
//                    console.log('Correct credentials.');
//                    //                        window.location.href = 'payment-completed.php';
//                }
//            }
//            , beforeSend: function () {
//                //			$('#btn-login').html('Loading...');
//            }
//            , complete: function () {
//                console.log('ajax call completed');
//            }
//            , error: function (exception) {
//                console.log(exception);
//            }
//        });
//    });
//})