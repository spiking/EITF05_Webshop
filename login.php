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
		//something like this to login
		//$sql = "SELECT salt FROM users WHERE username = '$name'";
      	//$salt = mysqli_query($db,$sql);
		//$hashed_password = hash('sha512', $password . $salt);
		//$sql = "SELECT id FROM users WHERE username = '$name' AND hashed_password = '$hashed_password'";
		//$results = mysqli_query($db,$sql);
		//$count = mysqli_num_rows($result);

		//if ($count == 1) {
		//	session_register($name)
		//	$_SESSION['name'] = $name;
		//	$_SESSION['email'] = $email;
		//	$_SESSION['address'] = $address;
		//}
	}
	//redirect to page
?>
<!--Place holder, will be removed-->
Welcome <?php echo $name; ?><br>
Your email address is: <?php echo $email;?><br>
Your address is: <?php echo $address;?><br>
Your password is: <?php echo $password;?><br>

</body>
</html>
