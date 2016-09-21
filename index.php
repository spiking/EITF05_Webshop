<?php

session_start(); 

if (!isset($_SESSION['ID'])) {
    session_destroy();
    header("location: login.html");
}

//$_SESSION['cart']['iFone7'] = array('product' => 'iFone7', 'price' => 7495, 'quantity' => 0);
//$_SESSION['cart']['ZamZung7'] = array('product' => 'ZamZung', 'price' => 6990, 'quantity' => 0);
//$_SESSION['cart']['GoogleX'] = array('product' => 'GoogleX', 'price' => 4990, 'quantity' => 0);

//$_SESSION['cart'] = array();
//print_r($_SESSION['cart']);

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
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	</head>

	<body id="top" class="scrollspy">

		<!-- Pre Loader -->
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
							<li><a href="php/cart.php">Cart</a></li>
							<?php 
							
							if (isset($_SESSION['name'])) {
								print '<li><a href="#">' . $_SESSION['name'] . '</a></li>';
								print '<li><a href="php/logout.php" onclick="logoutUser()">Log Out</a></li>';
							} else {
								print '<li><a href="login.html">Login</a></li>';
							//	print '<li><a href="php/logout.php" onclick="logoutUser()">Log Out</a></li>';
							}
	
                            ?>
						</ul>
						<ul id="nav-mobile" class="side-nav">
							<li><a href="index.php">Home</a></li>
							<li><a href="#">Products</a></li>
							<li><a href="#">Team</a></li>
							<li><a href="php/cart.php">Cart</a></li>
							<?php 
							
							if (isset($_SESSION['name'])) {
								print '<li><a href="#">' . $_SESSION['name'] . '</a></li>';
								print '<li><a href="php/logout.php" onclick="logoutUser()">Log Out</a></li>';
							} else {
								print '<li><a href="login.html">Login</a></li>';
							//	print '<li><a href="php/logout.php" onclick="logoutUser()">Log Out</a></li>';
							}
	
                            ?>
						</ul>
						<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
					</div>
				</div>
			</nav>
		</div>

		<!--Banner-->
		<div class="section no-pad-bot" id="index-banner">
			<div class="container">
				<h1 class="text_h center header cd-headline letters type">
            <span>Magical Mobile Market: </span>
            <span class="cd-words-wrapper waiting">
                <b class="is-visible">Speed</b>
                <b>Simplicity</b>
                <b>Elegance</b>
            </span>
        </h1>
			</div>
		</div>

		<!--Home-->
		<div id="home" class="section scrollspy">
			<div class="container">
				<div class="row">
					<div class="col s12">
						<h2 class="center header text_h2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="span_h2"> Phasellus  </span>vestibulum lorem risus, nec suscipit lorem <span class="span_h2"> laoreet quis.</span> </h2>
					</div>

					<div class="col s12 m4 l4">
						<div class="center promo promo-example">
							<i class="mdi-hardware-phone-iphone"></i>
							<h5 class="promo-caption">Fantastic Phones</h5>
							<p class="light center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
						</div>
					</div>
					<div class="col s12 m4 l4">
						<div class="center promo promo-example">
							<i class="mdi-editor-attach-money"></i>
							<h5 class="promo-caption">Incredible Prices</h5>
							<p class="light center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
						</div>
					</div>
					<div class="col s12 m4 l4">
						<div class="center promo promo-example">
							<i class="mdi-social-group"></i>
							<h5 class="promo-caption">Support Always Available</h5>
							<p class="light center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Products-->
		<div class="section scrollspy" id="products">
			<div class="container">
				<h2 class="header text_b">Products </h2>
				<div class="row">
					<div class="col s12 m4 l4">
						<div class="card">
							<div class="card-image waves-effect waves-block waves-light">
								<img class="activator" src="img/product_1.jpg">
							</div>
							<div class="card-content">
								<p class="word-break"><span class="card-title activator grey-text text-darken-4"><b>iFone 7</b><i class="mdi-navigation-more-vert right"></i>
                        | 7490 kr</p>
                        </span>
								<p><a class="waves-effect waves-light btn" name="insert" style="color:#fff; background-color:#2196F3" id="buyBtn" onclick="Materialize.toast('iFone 7 was added to your cart.', 4000); productAjax('iFone7')">BUY IT NOW</a></p>
							</div>
							<div class="card-reveal">
								<span class="card-title grey-text text-darken-4">iFone 7 <i class="mdi-navigation-close right"></i></span>
								<p>iFone 7 dramatically improves the most important aspects of the iFone experience. It introduces advanced new camera systems. The best performance and battery life ever in an iFone. Immersive stereo speakers. The brightest, most colorful iFone display. Splash and water resistance.1 And it looks every bit as powerful as it is. This is iFone 7.</p>
							</div>
						</div>
					</div>
					<div class="col s12 m4 l4">
						<div class="card">
							<div class="card-image waves-effect waves-block waves-light">
								<img class="activator" src="img/product_2.jpg">
							</div>
							<div class="card-content">
								<p class="word-break"><span class="card-title activator grey-text text-darken-4"><b>ZamZung 7</b><i class="mdi-navigation-more-vert right"></i>
                        | 6990 kr
                                    </span></p>
								<p><a class="waves-effect waves-light btn" name="product" value="iFone7" style="color:#fff; background-color:#2196F3" id="buyBtn" onclick="Materialize.toast('ZamZung 7 was added to your cart.', 4000); productAjax('ZamZung7')" )>BUY IT NOW</a></p>
							</div>

							<div class="card-reveal">
								<span class="card-title grey-text text-darken-4">ZamZung 7 <i class="mdi-navigation-close right"></i></span>
								<p>ZamZung 7 are Android smartphones manufactured and marketed by ZamZung Electronics. The S7 series is a successor to the 2015 Galaxy S6, S6 Edge and S6 Edge+, and was officially unveiled on 21 February 2016 during a ZamZung 7 press conference at Mobile World Congress, with a European and North American release scheduled for 11 March 2016. As with the S6, the S7 is produced in a standard model with a display size of 5.1 inches, as well as an Edge variant whose 5.5-inch display is curved along the wide sides of the screen</p>
							</div>
						</div>
					</div>
					<div class="col s12 m4 l4">
						<div class="card">
							<div class="card-image waves-effect waves-block waves-light">
								<img class="activator" src="img/product_3.jpg">
							</div>
							<div class="card-content">
								<p class="word-break"><span class="card-title activator grey-text text-darken-4"><b>Google X</b><i class="mdi-navigation-more-vert right"></i>
                        | 4990 kr
                                    </span></p>
								<p><a class="waves-effect waves-light btn" style="color:#fff; background-color:#2196F3" id="buyBtn" onclick="Materialize.toast('Google X was added to your cart.', 4000); productAjax('GoogleX')">BUY IT NOW</a></p>
							</div>

							<div class="card-reveal">
								<span class="card-title grey-text text-darken-4">Google X <i class="mdi-navigation-close right"></i></span>
								<p>Google X is a line of consumer electronic devices that run the Android operating system. Google manages the design, development, marketing, and support of these devices, but some development and all manufacturing are carried out by partnering with original equipment manufacturers (OEMs). As of August 2016, the devices currently available in the line are two smartphones, the Nexus 6P (made with Huawei) and Nexus 5X (made with LG).</p>
							</div>
						</div>
					</div>
					<div class="col s12 m4 l4">
						<div class="card">
							<div class="card-image waves-effect waves-block waves-light">
								<img class="activator" src="img/product_1.jpg">
							</div>
							<div class="card-content">
								<p class="word-break"><span class="card-title activator grey-text text-darken-4"><b>iFone 7</b><i class="mdi-navigation-more-vert right"></i>
                        | 7490 kr
                                    </span></p>
								<p><a class="waves-effect waves-light btn" name="insert" style="color:#fff; background-color:#2196F3" id="buyBtn" onclick="Materialize.toast('iFone 7 was added to your cart.', 4000); productAjax('iFone7')">BUY IT NOW</a></p>
							</div>

							<div class="card-reveal">
								<span class="card-title grey-text text-darken-4">iFone 7 <i class="mdi-navigation-close right"></i></span>
								<p>iFone 7 dramatically improves the most important aspects of the iFone experience. It introduces advanced new camera systems. The best performance and battery life ever in an iFone. Immersive stereo speakers. The brightest, most colorful iFone display. Splash and water resistance.1 And it looks every bit as powerful as it is. This is iFone 7.</p>
							</div>
						</div>
					</div>
					<div class="col s12 m4 l4">
						<div class="card">
							<div class="card-image waves-effect waves-block waves-light">
								<img class="activator" src="img/product_2.jpg">
							</div>
							<div class="card-content">
								<p class="word-break"><span class="card-title activator grey-text text-darken-4"><b>ZamZung 7</b><i class="mdi-navigation-more-vert right"></i>
                        | 6990 kr
                                    </span></p>
								<p><a class="waves-effect waves-light btn" name="product" value="iFone7" style="color:#fff; background-color:#2196F3" id="buyBtn" onclick="Materialize.toast('ZamZung 7 was added to your cart.', 4000); productAjax('ZamZung7')" )>BUY IT NOW</a></p>
							</div>

							<div class="card-reveal">
								<span class="card-title grey-text text-darken-4">ZamZung 7 <i class="mdi-navigation-close right"></i></span>
								<p>ZamZung 7 are Android smartphones manufactured and marketed by ZamZung Electronics. The S7 series is a successor to the 2015 Galaxy S6, S6 Edge and S6 Edge+, and was officially unveiled on 21 February 2016 during a ZamZung 7 press conference at Mobile World Congress, with a European and North American release scheduled for 11 March 2016. As with the S6, the S7 is produced in a standard model with a display size of 5.1 inches, as well as an Edge variant whose 5.5-inch display is curved along the wide sides of the screen</p>
							</div>
						</div>
					</div>
					<div class="col s12 m4 l4">
						<div class="card">
							<div class="card-image waves-effect waves-block waves-light">
								<img class="activator" src="img/product_3.jpg">
							</div>
							<div class="card-content">
								<p class="word-break"><span class="card-title activator grey-text text-darken-4"><b>Google X</b><i class="mdi-navigation-more-vert right"></i>
                        | 4990 kr
                                    </span></p>
								<p><a class="waves-effect waves-light btn" style="color:#fff; background-color:#2196F3" id="buyBtn" onclick="Materialize.toast('Google X was added to your cart.', 4000); productAjax('GoogleX')">BUY IT NOW</a></p>
							</div>

							<div class="card-reveal">
								<span class="card-title grey-text text-darken-4">Google X <i class="mdi-navigation-close right"></i></span>
								<p>Google X is a line of consumer electronic devices that run the Android operating system. Google manages the design, development, marketing, and support of these devices, but some development and all manufacturing are carried out by partnering with original equipment manufacturers (OEMs). As of August 2016, the devices currently available in the line are two smartphones, the Nexus 6P (made with Huawei) and Nexus 5X (made with LG).</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Parallax-->
		<div class="parallax-container">
			<div class="parallax"><img src="img/flat_parallax.png"></div>
		</div>

		<!--Team-->
		<div class="section scrollspy" id="team">
			<div class="container">
				<h2 class="header text_b"> Team </h2>
				<div class="row">
					<div class="col s12 m3">
						<div class="card card-avatar">
							<div class="waves-effect waves-block waves-light">
								<img class="activator" src="img/batman.png">
							</div>
							<div class="card-content">
								<span class="card-title activator grey-text text-darken-4">Batman <br/>
                            <small><em><a class="red-text text-darken-1" href="#"><b></b>CEO</a></em></small></span>
							</div>
						</div>
					</div>
					<div class="col s12 m3">
						<div class="card card-avatar">
							<div class="waves-effect waves-block waves-light">
								<img class="activator" src="img/batman.png">
							</div>
							<div class="card-content">
								<span class="card-title activator grey-text text-darken-4">Batman <br/>
                            <small><em><a class="red-text text-darken-1" href="#"><b></b>Developer</a></em></small></span>
							</div>
						</div>
					</div>
					<div class="col s12 m3">
						<div class="card card-avatar">
							<div class="waves-effect waves-block waves-light">
								<img class="activator" src="img/batman.png">
							</div>
							<div class="card-content">
								<span class="card-title activator grey-text text-darken-4">Batman <br/>
                            <small><em><a class="red-text text-darken-1" href="#"><b></b>Security Expert</a></em></small></span>
							</div>
						</div>
					</div>
					<div class="col s12 m3">
						<div class="card card-avatar">
							<div class="waves-effect waves-block waves-light">
								<img class="activator" src="img/batman.png">
							</div>
							<div class="card-content">
								<span class="card-title activator grey-text text-darken-4">Batman <br/>
                            <small><em><a class="red-text text-darken-1" href="#"><b></b>Designer</a></em></small></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Footer-->
		<footer id="contact" class="page-footer default_color scrollspy">
			<div class="container" style="height: 200px;">
				<div class="row">
					<div class="col l6 s12">
						<!--                    Contact infor or w.e -->
					</div>
				</div>
			</div>
		</footer>

		<script>
			function productAjax(product) {
        
				$.ajax({
					url: 'php/addToCart.php'
					, type: 'POST'
					, data: {
						"productType": product
					}
					, success: function (response) {
						console.log(response);
					}
				});
			}
		</script>

		<!--jQuery-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

		<!--   Script Files -->
		<script src="js/materialize-min.js"></script>
		<script src="js/main-min.js"></script>

	</body>

	</html>