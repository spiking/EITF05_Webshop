<?php

session_start();

if (!isset($_SESSION['ID'])) {
    session_destroy();
    header("location: login.html");
}

$_SESSION['PAYMENT_COMPLETED'] = true; 

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
        <title>Starter Template - Materialize</title>

        <!--    CSS -->
        <link href="../css/style-payment-completed.css" type="text/css" rel="stylesheet">
        <link href="../css/style-main.css" type="text/css" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />

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
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="cart.php">Cart</a></li>
                            <?php 
							
							if (isset($_SESSION['name'])) {
								print '<li><a href="#">' . $_SESSION['name'] . '</a></li>';
								print '<li><a href="logout.php" onclick="logoutUser()">Log Out</a></li>';
							} else {
								print '<li><a href="../login.html">Login</a></li>';
							//	print '<li><a href="logout.php" onclick="logoutUser()">Log Out</a></li>';
							}
	
                            ?>
                        </ul>
                        <ul id="nav-mobile" class="side-nav">
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="cart.php">Cart</a></li>
                            <?php 
							
							if (isset($_SESSION['name'])) {
								print '<li><a href="#">' . $_SESSION['name'] . '</a></li>';
								print '<li><a href="logout.php" onclick="logoutUser()">Log Out</a></li>';
							} else {
								print '<li><a href="../login.html">Login</a></li>';
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

                    <div>
                        <div class="container">
                            <div class="wrapper">
                                <h2 class="header text_b">Receipt</h2>
                                <?php
                    if(isset($_SESSION['cart']['iFone7'])){
							$iFone7Name = $_SESSION['cart']['iFone7']['product'];
							$iFone7Count = $_SESSION['cart']['iFone7']['quantity'];
							$iFone7Price = $_SESSION['cart']['iFone7']['price'];
						  }

						  if(isset($_SESSION['cart']['ZamZung7'])){
							 $zamZung7Name = $_SESSION['cart']['ZamZung7']['product'];
							 $zamZung7Count = $_SESSION['cart']['ZamZung7']['quantity'];
							 $zamZung7Price = $_SESSION['cart']['ZamZung7']['price'];
						  }

				          if(isset($_SESSION['cart']['GoogleX']['product'])){
							 $googleXName = $_SESSION['cart']['GoogleX']['product'];
							 $googleXCount = $_SESSION['cart']['GoogleX']['quantity'];
							 $googleXPrice= $_SESSION['cart']['GoogleX']['price'];
						  }

					if (!empty($_SESSION['cart'])) {
						print '<table id="cart-table">';
						    print '<thead>';
                            	print '<tr>';
						        print '<th data-field="img">Product</th>';
                                print '<th data-field="name">Name</th>';
                                print '<th data-field="price">Price</th>';
                                print '<th data-field="amount">Amount</th>';
                            print '</tr>';
						 print '</thead>';
					} else {
						print '<h5 id="cart-empty" style="color:grey; font-size:18px; margin-top:20px;">Empty</h5>';
					}
                    
                        print '<h5 id="cart-empty-hidden" style="color:grey; font-size:18px; margin-top:20px; display:none">Empty</h5>';
                        print '<tbody>';
                            print '<tr>';
                            if (isset($iFone7Count) && $iFone7Count > 0) {
                                print '<tr>';
                                    print '<td><img src="../img/product_1.jpg" alt="" border=3 height=100 width=100></img>
                                    </td>';
                                    print '<td>' . $iFone7Name . '</td>';
                                    print '<td>' . $iFone7Price . ' SEK</td>';
                                    print '<td>' . $iFone7Count . ' </td>';
                                print '</tr>';
                            }
                
                            if (isset($zamZung7Count) && $zamZung7Count > 0) {
                                print '<tr>';
                                    print ' <td><img src="../img/product_2.jpg" alt="" border=3 height=100 width=100></img>
                                    </td>';
                                    print '<td>' . $zamZung7Name . '</td>';
                                    print '<td>' . $zamZung7Price . ' SEK</td>';
                                    print '<td>' . $zamZung7Count . ' </td>';
                                print '</tr>';
                            }

                            if (isset($googleXCount) && $googleXCount > 0) {
                                print '<tr>';
                                    print '<td><img src="../img/product_3.jpg" alt="" border=3 height=100 width=100></img>
                                    </td>';
                                    print '<td>' . $googleXName . '</td>';
                                    print '<td>' . $googleXPrice. ' SEK</td>';
                                    print '<td>' . $googleXCount . ' </td>';
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
													if(isset($_SESSION['cart']['iFone7'])){
													  $iFone7Count = $_SESSION['cart']['iFone7']['quantity'];
													  $iFone7Price = $_SESSION['cart']['iFone7']['price'];
													 }

													 if(isset($_SESSION['cart']['ZamZung7'])){
														$zamZung7Count = $_SESSION['cart']['ZamZung7']['quantity'];
														$zamZung7Price = $_SESSION['cart']['ZamZung7']['price'];
													 }

													 if(isset($_SESSION['cart']['GoogleX']['product'])){
														$googleXCount = $_SESSION['cart']['GoogleX']['quantity'];
														$googleXPrice= $_SESSION['cart']['GoogleX']['price'];
													 }

                                        $total = 0;

                                        if (isset($iFone7Count) && $iFone7Count > 0) {
                                            $total += $iFone7Count * $iFone7Price;
                                        }

                                        if (isset($zamZung7Count) && $zamZung7Count > 0) {
                                            $total += $zamZung7Count * $zamZung7Price;
                                        }

                                        if (isset($googleXCount) && $googleXCount > 0) {
                                            $total += $googleXCount * $googleXPrice;
                                        }

                                        print '<td class="total-price">' . $total . ' SEK</td>';

                                    ?>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <center> <a href="#" class="waves-effect waves-light btn-large orange" id="confirmButton" style="margin-bottom:20px;">FREE MONEY CLICK HERE!</a></center>
                            </div>
                        </div>
                    </div </div>
                </div>
            </div>


            <div class="parallax-container valign-wrapper">
                <div class="parallax"><img src="../img/flat_parallax.png" alt="Unsplashed background img 3"></div>
            </div>


            <!--jQuery-->
            <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

            <!--   Script Files -->
            <script src="../js/materialize-min.js"></script>
            <script src="../js/main-min.js"></script>


    </body>

    </html>