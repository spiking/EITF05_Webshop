<?php

session_start(); 

//$_SESSION['cart']['iFone7'] = array('product' => 'iFone7', 'quantity' => 0);
//$_SESSION['cart']['ZamZung7'] = array('product' => 'ZamZung', 'quantity' => 0);
//$_SESSION['cart']['GoogleX'] = array('product' => 'GoogleX', 'quantity' => 0);

//print_r($_SESSION['cart']);

/*$_SESSION['cart'] = array(); */

?>

	<!DOCTYPE html>
	<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
		<meta name="theme-color" content="#2196F3">
		<title>MMM - Mobile</title>

		<!-- CSS  -->
		<link href="css/style-main.css" type="text/css" rel="stylesheet">
		<link href="css/style-cart.css" type="text/css" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	</head>

	<body>

		<div id="loader-wrapper">
			<div id="loader"></div>
			<div class="loader-section section-left"></div>
			<div class="loader-section section-right"></div>
		</div>

		<!--Navigation-->
		<div class="navbar-fixed">
			<nav id="nav_f" class="default_color" role="navigation">
				<div class="container">
					<div class="nav-wrapper">
						<a href="#" id="logo-container" class="brand-logo">MMM</a>
						<ul class="right hide-on-med-and-down">
							<li><a href="index.php">Home</a></li>
							<li><a href="#">Products</a></li>
							<li><a href="#">Team</a></li>
							<li><a href="cart.php">Cart</a></li>
							<?php 
							
							if (isset($_SESSION['name'])) {
								print '<li><a href="#">' . $_SESSION['name'] . '</a></li>';
								print '<li><a href="logout.php" onclick="logoutUser()">Log Out</a></li>';
							} else {
								print '<li><a href="login.html">Login</a></li>';
							//	print '<li><a href="logout.php" onclick="logoutUser()">Log Out</a></li>';
							}
	
                            ?>
						</ul>
						<ul id="nav-mobile" class="side-nav">
							<li><a href="#">Home</a></li>
							<li><a href="#">Products</a></li>
							<li><a href="#">Team</a></li>
							<li><a href="">Cart</a></li>
							<li><a href="login.html">Login</a></li>
						</ul>
						<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
					</div>
				</div>
			</nav>
		</div>

		<header>
		</header>

		<div>
			<div class="container">
				<div class="wrapper">
					<h4 class="header text_b" id="cartTitle">Cart</h4>

					<?php 
                    
                    $iFone7Name = $_SESSION['cart']['iFone7']['product'];
                    $zamZung7Name = $_SESSION['cart']['ZamZung7']['product'];
                    $googleXName = $_SESSION['cart']['GoogleX']['product'];
                    
                    $iFone7Count = $_SESSION['cart']['iFone7']['quantity'];
                    $zamZung7Count = $_SESSION['cart']['ZamZung7']['quantity'];
                    $googleXCount = $_SESSION['cart']['GoogleX']['quantity'];
                    
                    $iFone7Price = $_SESSION['cart']['iFone7']['price'];
                    $zamZung7Price = $_SESSION['cart']['ZamZung7']['price'];
                    $googleXPrice= $_SESSION['cart']['GoogleX']['price'];
                    
                    
					if (!empty($_SESSION['cart'])) {
						print '<table>';
						    print '<thead>';
                            	print '<tr>';
						        print '<th data-field="img">Product</th>';
                                print '<th data-field="name">Name</th>';
                                print '<th data-field="price">Price</th>';
                                print '<th data-field="amount">Amount</th>';
                            print '</tr>';
						 print '</thead>';
					} else {
						print '<h5 id="cartEmpty" style="color:grey; font-size:18px; margin-top:20px;">Empty</h5>';					
					}
                        print '<tbody>';                      
                            print '<tr>';
                            if ($iFone7Count > 0) {
                                print '<tr>';
                                    print '<td><img src="img/product_1.jpg" alt="" border=3 height=100 width=100></img>
                                    </td>';
                                    print '<td>' . $iFone7Name . '</td>';
                                    print '<td>' . $iFone7Price . ' SEK</td>';
                                    print '<td>';
                                        print '<select class="browser-default">';
                                        print '<option value="" disabled selected>' . $iFone7Count . '</option>';  
                                        for ($x = 0; $x <= 10; $x++) {
                                                print '<option value="1">' . $x . '</option>'; 
                                        } 
                                        print '</select>';
                                    print '</td>';
                                print '</tr>';
                            }
                    
                            if ($zamZung7Count > 0) {
                                print '<tr>';
                                    print ' <td><img src="img/product_2.jpg" alt="" border=3 height=100 width=100></img>
                                    </td>';
                                    print '<td>' . $zamZung7Name . '</td>';
                                    print '<td>' . $zamZung7Price . ' SEK</td>';
                                    print '<td>';
                                        print '<select class="browser-default">';
                                        print '<option value="" disabled selected>' . $zamZung7Count . '</option>';  
                                        for ($x = 0; $x <= 10; $x++) {
                                                print '<option value="1">' . $x . '</option>'; 
                                        } 
                                        print '</select>';
                                    print '</td>';
                                print '</tr>';
                            }
                    
                            if ($googleXCount > 0) {
                                print '<tr>';
                                    print '<td><img src="img/product_3.jpg" alt="" border=3 height=100 width=100></img>
                                    </td>';
                                    print '<td>' . $googleXName . '</td>';
                                    print '<td>' . $googleXPrice. ' SEK</td>';
                                    print '<td>';
                                        print '<select class="browser-default">';
                                        print '<option value="" disabled selected>' . $googleXCount . '</option>';  
                                        for ($x = 0; $x <= 10; $x++) {
                                                print '<option value="1">' . $x . '</option>'; 
                                        } 
                                        print '</select>';
                                    print '</td>';
                                print '</tr>';
                            }

                            print '</tr>';
                        print '</tbody>';
                    print '</table>';
            ?>

						<table>
							<h4 class="header text_b"></h4>
							<thead>
								<tr>
									<th data-field="price">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php 
                                        $iFone7Count = $_SESSION['cart']['iFone7']['quantity'];
                                        $zamZung7Count = $_SESSION['cart']['ZamZung7']['quantity'];
                                        $googleXCount = $_SESSION['cart']['GoogleX']['quantity'];
                    
                                        $iFone7Price = $_SESSION['cart']['iFone7']['price'];
                                        $zamZung7Price = $_SESSION['cart']['ZamZung7']['price'];
                                        $googleXPrice= $_SESSION['cart']['GoogleX']['price'];
                                    
                                        $total = 0;
                                    
                                        if ($iFone7Count > 0) {
                                            $total += $iFone7Count * $iFone7Price;
                                        } 
                                        
                                        if ($zamZung7Count > 0) {
                                            $total += $zamZung7Count * $zamZung7Price;
                                        } 
                                    
                                        if ($googleXCount > 0) {
                                            $total += $googleXCount * $googleXPrice;
                                        }
                                
                                        print '<td>' . $total . ' SEK</td>';
                                            
                                    ?>
								</tr>
							</tbody>
						</table>
				</div>
				<a href="#" class="waves-effect waves-light btn-large red" style="margin-top:20px;" onclick="emptyCart()">Empty Cart</a>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<form class="col s12">
					<h4 class="header text_b">Information</h4>
					<div class="row">
						<div class="input-field col s6">
							<input id="first_name" type="text" class="validate">
							<label for="first_name">First Name</label>
						</div>
						<div class="input-field col s6">
							<input id="last_name" type="text" class="validate">
							<label for="last_name">Last Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="email" type="email" class="validate">
							<label for="email" data-error="Incorrect" data-success="right">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="address" type="text" class="validate">
							<label for="address">Address</label>
						</div>
					</div>
					<select class="browser-default">
						<option value="" disabled selected>Payment Option</option>
						<option value="1">Credit Card</option>
						<option value="2">Credit Card</option>
						<option value="3">Credit Card</option>
					</select>

					<div class="row">
						<div class="input-field col s12">
							<input id="creditcard" type="text" class="validate">
							<label for="creditcard">Credit Card Number</label>
						</div>
					</div>
				</form>

				<a href="payment-completed.php" class="waves-effect waves-light btn-large green" id="confirmButton">Confirm Payment</a>

			</div>
		</div>

		<!--Footer-->
		<footer id="contact" class="page-footer default_color scrollspy">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<!--                    Contact infor or w.e -->
					</div>
				</div>
			</div>
		</footer>


		<script>
			function emptyCart() {
				$.ajax({
					url: "emptyCart.php", //the page containing php script
					type: "POST", //request type
					success: function (result) {
						/*alert(result);*/
					}
				});

				location.reload();
			}
		</script>

		<!--jQuery-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

		<!--   Script Files -->
		<script src="js/materialize-min.js"></script>
		<script src="js/main-min.js"></script>

	</body>

	</html>