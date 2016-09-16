<?php

session_start(); 

    function func1($product){
        $_SESSION['cart'][$product]['quantity']++;
    }

    if (isset($_POST['productType'])) {
        func1($_POST['productType']);
    }
?>