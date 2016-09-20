<?php

	function setUpSession($name, $email, $address) {
		session_regenerate_id();
		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;
		$_SESSION['address'] = $address;
        $_SESSION['ID'] = session_regenerate_id();
//		header("location: ../index.php");
	}

	include('database.php');
	session_start();
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$db = new Database();

    $response = [];

	if (strlen($name) > 0 && strlen($address) > 0 && strlen($email) > 0 && strlen($password) > 0) {
		/*sanitize input*/
    	$salt = base64_encode(openssl_random_pseudo_bytes(8));
		$hashed_password = hash('sha512', $password . $salt);
		$sql = "INSERT INTO Users VALUES('$name', '$hashed_password', '$salt', '$address')";
		$results = $db -> executeUpdate($sql);

		if($results > 0){
			setUpSession($name, $email, $address);
            $response = [ 
                'error' => false,
                'msg' => 'Succesfull sign up!'	
            ];
		} else {
//			print "Could not register user";
            
            $response = [
			'error' => true,
			'msg' => 'Error!'
		];
            
		}
	} else if (strlen($name) > 0 && strlen($password) > 0) {
		if (!$db->confirmIPAddress($_SERVER['REMOTE_ADDR'])) {
            $response = [
                'error' => true,
                'msg' => 'Try again in 30 minutes!'
		    ];
//			print "Try again in 30 minutes from your last try";
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
                    $response = [ 
                        'error' => false,
                        'msg' => 'Succesfull login!'	
                    ];
//					header("location: ../index.php");
				} else {
					//log ip and increment number of failed attempts
					$db->addLogInAttempt($_SERVER['REMOTE_ADDR']);
                    $response = [
                        'error' => true,
                        'msg' => 'Incorrect Credentials!'
		            ];
//					print "Wrong username and/or password";
				}
			} else {
				//log ip and increment number of failed attempts
				$db->addLogInAttempt($_SERVER['REMOTE_ADDR']);
                $response = [
                    'error' => true,
                    'msg' => 'Incorrect Credentials!'
                ];
//				print "Wrong username and/or password";
			}
		}
	} else {
            $response = [
                'error' => true,
                'msg' => 'One or more blank fields.'
		    ];
    }

    header('Content-Type: application/json');
	echo json_encode($response);
	//redirect to page
?>