
<?php
	include('config.php');
	include('database.php');
	session_start();
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$db = new Database();

	if (strlen($name) > 0 && strlen($address) > 0) {
		/*sanitize input*/
    	$salt = base64_encode(openssl_random_pseudo_bytes(8));
		$hashed_password = hash('sha512', $password . $salt);
		$sql = "INSERT INTO Users VALUES('$name', '$hashed_password', '$salt', '$address')";
		$results = $db -> executeUpdate($sql);
		if($results == TRUE){
			print "User added";
		}else{
			print "Could not register user";
		}


	} else {

		//something like this to login
		//$sql = "SELECT salt FROM users WHERE username = '$name'";
      	//$salt = mysqli_query($db,$sql);
		//$hashed_password = hash('sha512', $password . $salt);
		$sql = "SELECT * FROM users WHERE userName = '$name'";
		$results = $db -> executeQuery($sql);
		$count = count($results);

		if ($count == 1){
			$salt = $results[0]['salt'];
			$stored_password_hash = $results[0]['password'];
			$hash = hash('sha512', $password . $salt);
			if ($hash === $stored_password_hash){
				print "Logged in!";
				$_SESSION['name'] = $name;
				$_SESSION['email'] = $email;
				$_SESSION['address'] = $address;
				header("location: index.html");
			}else {
				print "Wrong username and/or password";
			}

		//	session_register($name)

	}else {
		print "Wrong username and/or password";
	}
	}
	//redirect to page
?>
