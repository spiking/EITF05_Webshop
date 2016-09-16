<?php

	function setUpSession($name, $email, $address) {
		session_regenerate_id();
		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;
		$_SESSION['address'] = $address;
		header("location: index.php");
	}

	include('database.php');
	session_start();
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$db = new Database();

	if (strlen($name) > 0 && strlen($address) > 0 && strlen($email) > 0 && strlen($password) > 0) {
		/*sanitize input*/
    	$salt = base64_encode(openssl_random_pseudo_bytes(8));
		$hashed_password = hash('sha512', $password . $salt);
		$sql = "INSERT INTO Users VALUES('$name', '$hashed_password', '$salt', '$address')";
		$results = $db -> executeUpdate($sql);

		if($results > 0){
			setUpSession($name, $email, $address);
		} else {
			print "Could not register user";
		}
	} else if (strlen($name) > 0 && strlen($password) > 0) {
		if (!$db->confirmIPAddress($_SERVER['REMOTE_ADDR'])) {
			print "Try again in 30 minutes from your last try";
		} else {
			$sql = "SELECT * FROM users WHERE userName = '$name'";
			$results = $db -> executeQuery($sql);
			$count = count($results);

			if ($count == 1){
				$salt = $results[0]['salt'];
				$stored_password_hash = $results[0]['password'];
				$hash = hash('sha512', $password . $salt);

				if ($hash === $stored_password_hash){
					setUpSession($name, $email, $address);
					header("location: index.php");
				} else {
					//log ip and increment number of failed attempts
					$db->addLogInAttempt($_SERVER['REMOTE_ADDR']);
					print "Wrong username and/or password";
				}
			} else {
				//log ip and increment number of failed attempts
				$db->logAttempt($_SERVER['REMOTE_ADDR']);
				print "Wrong username and/or password";
			}
		}
	}
	//redirect to page
?>