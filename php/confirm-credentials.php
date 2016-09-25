<?php

function checkPwdReq($pwd) {
    return true; //while in development
    //return strlen($pwd) > 7 && preg_match("#[0-9]+#", $pwd) && preg_match("#[a-z]+#", $pwd) && preg_match("#[A-Z]+#", $pwd);
}

include('database.php');
session_start();

if (!isset($_SESSION['ID'])) {
    session_destroy();
    header("location: login.html");
}

$name = $_POST['name'];
$password = $_POST['password'];

$token_age = time() - $_SESSION['token_time'];
$token = $_POST['token'];

$db = new Database();
$response = [];

if (empty($_SESSION['cart'])) {
	$response = [
        'error' => true,            
		'msg' => 'Your cart is empty'
    ];
	header('Content-Type: application/json');
	echo json_encode($response);
	exit();
}

if (isset($name) && isset($password)) {
	// Check if random CSRF token is correct, and 5 minutes timeout
    if ($token == $_SESSION['token'] && $token_age < 300) {

        if (!$db->confirmIPAddress($_SERVER['REMOTE_ADDR'])) {
            $response = [
            	'error' => true,
            	'msg' => 'Try again in 30 minutes'
            ];
        } else {
            $sql = "SELECT * FROM users WHERE userName = ?";
            $results = $db -> executeQuery($sql, [$name]);
            $count = count($results);
            
            if ($count == 1){
                $stored_password_hash = $results[0]['password'];
                if (password_verify($password, $stored_password_hash)){
                    $address = $results[0]['address'];
                    $db->clearLoginAttempts($_SERVER['REMOTE_ADDR']);
                    $response = [
                    	'error' => false,
                    	'msg' => 'Succesfull login'
                    ];
                } else {
                    $db->addLogInAttempt($_SERVER['REMOTE_ADDR']);
                    $response = [
                    	'error' => true,
                    	'msg' => 'Incorrect Credentials'
                    ];
                }
            } else {
                $db->addLogInAttempt($_SERVER['REMOTE_ADDR']);
                $response = [
                	'error' => true,
                	'msg' => 'Incorrect Credentials'
                ];
            }
        }
    } else {
		$response = [
            'error' => true,
            'msg' => 'CSRF token false'
        ];
	}
    
} else {
    $response = [
    'error' => true,
    'msg' => 'One or more blank fields'
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
?>