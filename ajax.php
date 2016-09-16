<?php

session_start(); 

    function addToCart($product){
        $_SESSION['cart'][$product]['quantity']++;
    }

    if (isset($_POST['productType'])) {
        addToCart($_POST['productType']);
    }
?>