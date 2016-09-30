<?php

session_start();

    function addToCart($product){

		if ($product == "iFone7") {
			$_SESSION['cart'][$product]['product'] = $product;
			$_SESSION['cart'][$product]['price'] = 7490;
		}

		if ($product == "ZamZung7") {
			$_SESSION['cart'][$product]['product'] = $product;
			$_SESSION['cart'][$product]['price'] = 6990;
		}

		if ($product == "GoogleX") {
			$_SESSION['cart'][$product]['product'] = $product;
			$_SESSION['cart'][$product]['price'] = 4990;
		}

        $_SESSION['cart'][$product]['quantity']++;
    }


    if (isset($_POST['productType'])) {
        addToCart($_POST['productType']);
    }
?>
