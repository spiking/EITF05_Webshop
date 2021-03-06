<?php

// Destroy session

session_start();
session_destroy();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#2196F3">
    <!-- XSS-prevention, not allowed to load resources from other location -->
    <meta http-equiv="Content-Security-Policy" content="default-src 'self' 'unsafe-inline' code.jquery.com fonts.googleapis.com *.code.jquery.com fonts.gstatic.com;">
    <title>MMM - Log Out</title>
    
    <link rel="stylesheet" href="../css/style-login-logout.css">
    
</head>

<body>
    <form action="../login.html" method="post">
		<hgroup-alt>
        <h1 style="color:#2196F3; margin-bottom:40px;">Magical Mobile Market</h1>
        <hr width="250px">
        <h3 id="title" style="color:#2196F3; font-size:22px; color:#777777; margin-top:40px; margin-bottom:40px;">You have succesfully been logget out!</h3>
    </hgroup-alt>
        <button type="submit" class="button buttonBlue" id="loginButton">Back To Login
            <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
        </button>
    </form>
    
    <!--jQuery-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/login-logout.js"></script>

</body>
</html>
