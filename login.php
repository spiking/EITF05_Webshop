<html>
<body>

<?php
	include('config.php');
	session_start();
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = $_POST['password'];

	if (strlen($address) > 0 && strlen(email) > 0) {
    	//register
	} else {
		//try to login
		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;
		$_SESSION['address'] = $address;
	}
	//redirect to page
?>

Welcome <?php echo $name; ?><br>
Your email address is: <?php echo $email;?><br>
Your address is: <?php echo $address;?><br>
Your password is: <?php echo $password;?><br>

</body>
</html>
