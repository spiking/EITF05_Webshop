<html>
<body>

<?php
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$password = $_POST['password'];

//session_start();
if (strlen($address) > 0 && strlen(email) > 0) {
    //register
} else {
	//try to login and session_start()
}
//redirect to page
?>

Welcome <?php echo $name; ?><br>
Your email address is: <?php echo $email;?><br>
Your address is: <?php echo $address;?><br>
Your password is: <?php echo $password;?><br>

</body>
</html>
