<?php

session_start(); 

    function updateCart($product, $quantity){
        $_SESSION['cart'][$product]['quantity'] = $quantity;
    }

    if (isset($_POST['updateCart'])) {
        updateCart($_POST['updateCart']);
    } 

?>