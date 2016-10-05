<?php

session_start();

    // Add to cart

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
        if (isset($_POST['ID']) && $_POST['ID'] === session_id()) {
            addToCart($_POST['productType']);
        }
    }

    // Empty cart

    function emptyCart() {
      $_SESSION['cart'] = array();
    }

    if (isset($_POST['empty'])) {
        if (isset($_POST['ID']) && $_POST['ID'] === session_id()) {
          emptyCart();
         }
    }

    // Update cart

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
      if (isset($_POST['ID']) && $_POST['ID'] === session_id()) {
         updateCartiFone7($_POST['quantity_iFone7']);
      }
    }

    if (isset($_POST['quantity_ZamZung7'])) {
      if (isset($_POST['ID']) && $_POST['ID'] === session_id()) {
         updateCartZamZung7($_POST['quantity_ZamZung7']);
      }
    }

    if (isset($_POST['quantity_GoogleX'])) {
      if (isset($_POST['ID']) && $_POST['ID'] === session_id()) {
         updateCartGoogleX($_POST['quantity_GoogleX']);
      }
    }

?>
