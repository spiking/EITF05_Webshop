<?php

	function setUpSession($name, $address) {
		session_regenerate_id();
		$_SESSION['name'] = $name;
		$_SESSION['address'] = $address;
        $_SESSION['ID'] = session_regenerate_id();
//		header("location: ../index.php");
	}

	function checkPwdReq($pwd) {
		return true; //while in development
		//return strlen($pwd) > 7 && preg_match("#[0-9]+#", $pwd) && preg_match("#[a-z]+#", $pwd) && preg_match("#[A-Z]+#", $pwd);
	}

	include('database.php');
	session_start();
	$name = $_POST['name'];
	$password = $_POST['password'];
	if(isset($_POST['address'])){
		$address = $_POST['address'];
	}
	$db = new Database();

    $response = [];

	if (isset($name) && isset($address) && isset($password)) {
		if (!checkPwdReq($password)) {
			$response = [
                'error' => true,
                'msg' => 'The password must contain at least:</br>7 characters</br>A Number</br>A lower case</br>An upper case'
            ];
		} else {
			/*sanitize input*/
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO Users VALUES(?, ?, ?)";
			$results = $db -> executeUpdate($sql, [$name, $hashed_password, $address]);

			if($results > 0){
				setUpSession($name, $address);
	            $response = [
	                'error' => false,
	                'msg' => 'Succesfull sign up'
	            ];
			} else {
	//			print "Could not register user";

	            $response = [
				'error' => true,
				'msg' => 'Username already taken'
			];

			}
		}
	} else if (isset($name) && isset($password)) {
		if (!$db->confirmIPAddress($_SERVER['REMOTE_ADDR'])) {
            $response = [
                'error' => true,
                'msg' => 'Try again in 30 minutes'
		    ];
//			print "Try again in 30 minutes from your last try";
		} else {
			$sql = "SELECT * FROM users WHERE userName = ?";
			$results = $db -> executeQuery($sql, [$name]);
			$count = count($results);

			if ($count == 1){
				$stored_password_hash = $results[0]['password'];
				if (password_verify($password, $stored_password_hash)){
					$address = $results[0]['address'];
					setUpSession($name, $address);
					$db->clearLoginAttempts($_SERVER['REMOTE_ADDR']);
                    $response = [
                        'error' => false,
                        'msg' => 'Succesfull login'
                    ];
//					header("location: ../index.php");
				} else {
					//log ip and increment number of failed attempts
					$db->addLogInAttempt($_SERVER['REMOTE_ADDR']);
                    $response = [
                        'error' => true,
                        'msg' => 'Incorrect Credentials'
		            ];
//					print "Wrong username and/or password";
				}
			} else {
				//log ip and increment number of failed attempts
				$db->addLogInAttempt($_SERVER['REMOTE_ADDR']);
                $response = [
                    'error' => true,
                    'msg' => 'Incorrect Credentials'
                ];
//				print "Wrong username and/or password";
			}
		}
	} else {
            $response = [
                'error' => true,
                'msg' => 'One or more blank fields'
		    ];
    }

    header('Content-Type: application/json');
	echo json_encode($response);
	//redirect to page
?>
