<?php

session_start();

    function updateCartiFone7($quantity){
        $_SESSION['cart']['iFone7']['quantity'] = $quantity;
    }

    function updateCartZamZung7($quantity){
        $_SESSION['cart']['ZamZung7']['quantity'] = $quantity;
    }

    function updateCartGoogleX($quantity){
        $_SESSION['cart']['GoogleX']['quantity'] = $quantity;
    }

    if (isset($_POST['quantity_iFone7'])) {
      // if (isset($_POST['ID']) == $_SESSION['ID']) {
      //    updateCartiFone7($_POST['quantity_iFone7']);
      // }
        updateCartiFone7($_POST['quantity_iFone7']);
    }

    if (isset($_POST['quantity_ZamZung7'])) {
      // if (isset($_POST['ID']) == $_SESSION['ID']) {
      //    updateCartZamZung7($_POST['quantity_ZamZung7']);
      // }
        updateCartZamZung7($_POST['quantity_ZamZung7']);
    }

    if (isset($_POST['quantity_GoogleX'])) {
      // if (isset($_POST['ID']) == $_SESSION['ID']) {
      //    updateCartGoogleX($_POST['quantity_GoogleX']);
      // }
        updateCartGoogleX($_POST['quantity_GoogleX']);
    }

?>
