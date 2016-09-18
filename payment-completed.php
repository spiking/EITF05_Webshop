<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Starter Template - Materialize</title>

    <!--    CSS -->
    <link href="css/style-payment-completed.css" type="text/css" rel="stylesheet">
    <link href="css/style-main.css" type="text/css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

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
						<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
					</div>
				</div>
			</nav>
		</div>

    <!--Banner-->
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <h1 class="text_h center header cd-headline letters type">
            <span>Order Completed: </span>
            <span class="cd-words-wrapper waiting">
                <b class="is-visible">Thank You!</b>
                <b>See You Soon!</b>
            </span>   
        </h1>
        </div>
    </div>


    <!--    Home-->
    <div id="home" class="section scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h2 class="center header text_h2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="span_h2"> Phasellus  </span>vestibulum lorem risus, nec suscipit lorem <span class="span_h2"> laoreet quis.</span> </h2>
                </div>

                <!--
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
-->

                <center> <a href="index.html" class="waves-effect waves-light btn-large orange" id="confirmButton">FREE MONEY CLICK HERE!</a></center>

            </div>
        </div>
    </div>


    <div class="parallax-container valign-wrapper">
        <div class="parallax"><img src="img/flat_parallax.png" alt="Unsplashed background img 3"></div>
    </div>





    <!--
    Parallax
    <div class="parallax-container">
        <div class="parallax"><img src="img/flat_parallax.png"></div>
    </div>
-->



    <!--
    <footer id="contact" class="page-footer default_color scrollspy">
        <div class="container" style="height: 200px;">
            <div class="row">
                <div class="col l6 s12">
                                        Contact infor or w.e 
                </div>
            </div>
        </div>
    </footer>
-->



    <!--jQuery-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!--   Script Files -->
    <script src="js/materialize-min.js"></script>
    <script src="js/main-min.js"></script>


</body>

</html>